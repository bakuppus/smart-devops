def project = 'modern-cubist-206411'
def  appName = 'oa-app'
def  feSvcName = "${appName}-frontend"
def  imageTag = "gcr.io/${project}/${appName}:latest"


podTemplate(
    label: 'saas-dev1-cd', 
    inheritFrom: 'default',
    containers: [
        containerTemplate(
            name: 'gcloud', 
            image: 'gcr.io/cloud-builders/gcloud',
            ttyEnabled: true,
            command: 'cat'
        ),
        containerTemplate(
            name: 'kubectl', 
            image: 'gcr.io/cloud-builders/kubectl',
            ttyEnabled: true,
            command: 'cat'
        ),
        containerTemplate(
            name: 'docker', 
            image: 'docker:18.02',
            ttyEnabled: true,
            command: 'cat'
        ),
        containerTemplate(
            name: 'helm', 
            image: 'ibmcom/k8s-helm:v2.6.0',
            ttyEnabled: true,
            command: 'cat'
        ),        
    ],
volumes: [
  hostPathVolume(mountPath: '/home/gradle/.gradle', hostPath: '/tmp/jenkins/.gradle'),
  hostPathVolume(mountPath: '/var/run/docker.sock', hostPath: '/var/run/docker.sock')
]
) {
    node('saas-dev1-cd') {
        try {         
            
            def commitId
            stage ('Extract') {
                checkout scm
                commitId = sh(script: 'git rev-parse --short HEAD', returnStdout: true).trim()
            }

            def subject = "STARTED: Push dev commit ID: '${commitId}' to https://1dev.live"
            slackSend ('YELLOW': '#FFFF00', message: "${subject} \n\n (JnksBuild: ${env.BUILD_URL})")


            stage('Cluster Switch - GKE') {
                    
                container('gcloud') {
                sh "gcloud container clusters get-credentials saas-dev1 --zone europe-west2-c --project modern-cubist-206411"
                }
                
            }  
            
            stage ('Push Dev') {
                container ('kubectl') {                
                    sh 'kubectl patch deployment webserver -p  "{\\"spec\\":{\\"template\\":{\\"metadata\\":{\\"labels\\":{\\"date\\":\\"`date +%s`\\"}}}}}"';
                    
                }
                
            }

            //def repository
            // stage ('Build') {
            
            //     container ('docker') {
            //         docker.withRegistry("https://gcr.io", 'gcr:cd-jenkins') {
            //             def dockerfile = '.docker/sidecar/Dockerfile'
            //             def customImage = docker.build("gcr.io/modern-cubist-206411/${appName}:0.3.${env.BUILD_NUMBER}", "-f ${dockerfile} .")
            //             /* Push the container to the custom Registry */
            //             customImage.push()
            //         }                
            //     }

            // }
            
            // stage ('Deploy') {
            //     container ('helm') {                
            //         sh "/helm init --client-only --skip-refresh"                
            //         sh "/helm upgrade --install --wait --set image.repository=gcr.io/modern-cubist-206411/${appName},image.tag=0.3.${env.BUILD_NUMBER} webserver .helm/dev"                             
            //     }
                
            // }

        } catch (e) {
            // If there was an exception thrown, the build failed
            currentBuild.result = "FAILED"
            throw e
        } finally {
            // Success or failure, always send notifications
         
            buildStatus = currentBuild.result
            buildStatus =  buildStatus ?: 'SUCCESSFUL'

            // Default values
            def colorName = 'RED'
            def colorCode = '#FF0000'
            def subject = "${buildStatus}: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]'"
            def summary = "${subject} (${env.BUILD_URL})"

            // Override default values based on build status
            if (buildStatus == 'STARTED') {
                color = 'YELLOW'
                colorCode = '#FFFF00'
            } else if (buildStatus == 'SUCCESSFUL') {
                color = 'GREEN'
                colorCode = '#00FF00'
            } else {
                color = 'RED'
                colorCode = '#FF0000'
            }

            // Send notifications
            slackSend (color: colorCode, message: summary)
        }

        

    }

    
}
