//elements
const oa_paraText = document.getElementById('paraText');
const oa_footer = document.getElementById('oa_footer');
const oaFooterButton = document.getElementById('oa_footer_button_text');
const oaFooterNext = document.getElementById('oa_footer_next_text');
const oa_how_it_work = document.getElementById('oa_how_it_work');
const headTextDiv = document.getElementById('headText');
const downArrow = document.getElementById('downArrow');
const logo = document.getElementById('logo');
const logoW = document.getElementById('logo-w');
const startTrial = document.getElementById('startTrial');
const navLinks = document.getElementsByClassName('nav-link');
const oaSectionText = document.getElementById('oa_section_text');
function section({
  color,
  head,
  footerButton,
  footerNext,
  paragraphText,
  oa_show_how_it_work,
  features
}) {
  oa_paraText.innerHTML = paragraphText;
  oa_paraText.style.color = color;
  downArrow.style.borderColor = color;
  headTextDiv.style.color = color;
  headTextDiv.innerHTML = head;
  oa_footer.style.color = color;
  oaFooterButton.style.borderColor = color;
  oaFooterButton.innerText = footerButton;
  oaFooterNext.innerText = footerNext;
  oa_how_it_work.style.display = oa_show_how_it_work ? 'block' : 'none';
  oaFeatures = features ? get_oa_features(features) : '';
  if ($('.oa_features').length == 1) {
    $('.oa_features').replaceWith(oaFeatures);
  } else {
    $('.oa_section_text').append(oaFeatures);
  }
}

function get_oa_features(features) {
  var oaFeatures = document.createElement('div');
  oaFeatures.setAttribute('class', 'oa_features');
  for (feature of features) {
    var oaFeature = document.createElement('span');
    oaFeature.setAttribute('class', 'oa_feature');

    var oaFeature_icon = document.createElement('i');
    oaFeature_icon.setAttribute('class', 'fa fa-fw fa-check-circle');

    var oaFeature_text = document.createElement('span');
    oaFeature_text.setAttribute('class', 'oa_feature_text');
    var t = document.createTextNode(feature);
    oaFeature_text.appendChild(t);
    oaFeature.appendChild(oaFeature_icon);
    oaFeature.appendChild(oaFeature_text);

    oaFeatures.appendChild(oaFeature);
  }

  // oaSectionText.appendChild(oaFeatures);
  return oaFeatures;
}

new fullpage('#fullpage', {
  licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
  anchors: [
    'welcome',
    'lms',
    'vclassrooms',
    'ecommerce',
    'successStories',
    'partners',
    'emailSubscribe'
  ],
  sectionsColor: ['#8101A8', '#F3F2EE', '#fff', '#fff', '#fff', '#000', '#fff'],
  menu: '#myMenu',
  scrollingSpeed: 650,
  autoScrolling: true,
  scrollHorizontally: true,
  loopBottom: false,
  scrollOverflow: true,
  fixedElements: '#oa_footer, #oa_section_text',
  menu: '#menu',
  css3: true,
  navigation: true,
  navigationPosition: 'right',
  onLeave: function(origin, { anchor }, direction) {
    if (anchor == 'welcome' || anchor == 'partners') {
      oaFooterButton.style.display = 'block';
      oaSectionText.style.width = '400px';
      logo.style.display = 'none';
      logoW.style.display = 'block';
      startTrial.style.borderColor = '#fff';
      startTrial.pseudoStyle('after', 'border-color', '#fff !important;');
      for (navLink of navLinks) {
        navLink.style.color = '#fff';
      }
    } else {
      oaFooterButton.style.display = 'block';
      oaSectionText.style.width = '400px';
      if (anchor == 'emailSubscribe') {
        oaFooterButton.style.display = 'none';
        oaSectionText.style.width = '100%';
      }
      logo.style.display = 'block';
      logoW.style.display = 'none';
      startTrial.pseudoStyle('after', 'border-color', '#954AE8 !important;');
      for (navLink of navLinks) {
        navLink.style.color = '#000';
      }
    }
    section(sectionInfo[anchor]);
  }
});

var UID = {
  _current: 0,
  getNew: function() {
    this._current++;
    return this._current;
  }
};

HTMLElement.prototype.pseudoStyle = function(element, prop, value) {
  var _this = this;
  var _sheetId = 'pseudoStyles';
  var _head = document.head || document.getElementsByTagName('head')[0];
  var _sheet =
    document.getElementById(_sheetId) || document.createElement('style');
  _sheet.id = _sheetId;
  var className = 'pseudoStyle' + UID.getNew();

  _this.className += ' ' + className;

  _sheet.innerHTML +=
    ' .' + className + ':' + element + '{' + prop + ':' + value + '}';
  _head.appendChild(_sheet);
  return this;
};
