// for hamburger
let hamburgerbtn = document.querySelector('#hamburger button');
hamburgerbtn.addEventListener('click', function (e) {
    document.querySelector('#mobilesidebar').style.display = 'flex';
});

let closebtn = document.querySelector('#mobilesidebar #closebtn');
closebtn.addEventListener('click', function (e) {
    document.querySelector('#mobilesidebar').style.display = 'none';
});



// for lyrics tabs
function showTabContent(tabId) {
    const tabs = document.querySelectorAll('ul li');
    const contentDivs = document.querySelectorAll('#main-content > div');

    contentDivs.forEach((div) => {
        div.style.display = 'none';
    });

    tabs.forEach((tab) => {
        tab.classList.remove('active');
    });

    const activeTab = document.querySelector(`#${tabId}`);
    activeTab.style.display = 'block';

    const activeTabLink = document.querySelector(`[href="#${tabId}"]`);
    activeTabLink.parentElement.classList.add('active');
}
showTabContent('lyrics');