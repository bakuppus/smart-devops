# OneAcademy LMS platform [dev site](https://dev.1acad.me)  -- V 0.2.0 [Change Log](changelog.md)

This document descripes Smartella OneAcademy Platform SaaS project

## Local development environoment setup with docker
1. Install docker
2. Clone platform repository
3. Switch to dev branch
4. Modify hosts file, add "db.one, adminer.one dev.one, lms.dev.one"
5. Switch to projct folder root "/platform"
6. run $ cd default-config && . seed.sh
7. Run `docker-compose up`
8. Go to db.one to access phpmyadmin

**Container apps credentials:**
* Wordpress dev.one
user: admin
pass: admin

* Moodle lms.dev.one
user: admin
pass: Admin_123

* Phpmyadmin db.one
user: root
pass: pass123

* adminer - adminer.one
user: root
pass: pass123

---

###V 0.2.0 [Change Log](changelog.md)

**Wordpress** v 4.9.8
Plugins: 
1.  Woocommerce
2.  Woocommerce-services
3.  wpmudev
4.  wp-defender
5.  pro-sits
6.  cloner
7.  domain-mapping
8.  theme-editor


**Moodle** v 3.3.1
Themes:
1.Snap
