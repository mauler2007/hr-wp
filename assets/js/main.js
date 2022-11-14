document.addEventListener("DOMContentLoaded", function () {

  let width = Math.max(window.innerWidth,
    document.documentElement.clientWidth,
    document.body.clientWidth);

  const vacancy = document.querySelector('.vacancy');
  const vacancyPage = document.querySelector('.vacancy--page');
  // let vacancyPage;

  function addBlock() {
    let el = document.createElement('div');
    el.classList.add('empty');

    if (!vacancy.querySelector('.empty')) {
      vacancy.prepend(el);
    }
  }

  function firstScreen() {
    const header = document.querySelector('.header');

    if (width > 1199) {
      const headerHeight = header.scrollHeight;
      const mediaMinHeight = window.matchMedia('(min-height: 600px)');
      const mediaMaxHeight = window.matchMedia('(max-height: 1080px)');

      if (mediaMinHeight.matches && mediaMaxHeight.matches) {
        if (vacancy) {
          vacancy.style.minHeight = `calc(100vh - ${headerHeight}px)`;
          addBlock();
        }
        if (vacancyPage) {
          console.log('vacancyPage');
          // vacancyPage.style.marginTop = "2em";
        }
      }
    } else {
      header.style.marginBottom = '5vw';
    }
  }

  firstScreen();

  window.addEventListener('resize', firstScreen);

  //========= vacancy-anim start
  let vac = document.querySelectorAll('.position');

  window.addEventListener('scroll', function () {
    vac.forEach(element => {
      if (window.innerHeight + document.documentElement.scrollTop > element.offsetTop) {
        element.classList.add('position--show');
      }
    });
  }); //========= vacancy-anim end


  // ========   checkboxes state start ========================
  const checkboxes = document.querySelectorAll('.position__customCheckbox input:not([disabled])');
  let checkboxData = []; // сюда буду класть обьекты для вывода в локал сторадж

  // заполняю локалсторадж , если там пусто.
  if (!JSON.parse(localStorage.getItem('list'))) {
    //  на каждой итерации   создаю новый обьект  
    checkboxes.forEach(function (element) {
      let id = element.getAttribute('id');

      newLike = {
        id: id,
        like: false
      };

      checkboxData.push(newLike); // пушу  созданные обьекты в массив для вывода  в локал сторадж  
      localStorage.setItem('list', JSON.stringify(checkboxData)); // и в локалсторадж
    });
  }

  if (localStorage.getItem('list')) {
    let arrFromStorage = JSON.parse(localStorage.getItem('list'));
    // заполняю  актуальными данными о состонии чекбоксов
    checkboxData = arrFromStorage;

    // перебираю  массив с обьектами из локал стораджа
    for (let i = 0; i < arrFromStorage.length; i++) {
      let input = document.getElementById(arrFromStorage[i]["id"]);

      //  если есть лайк - добавляю аттрибут
      if (input != null && arrFromStorage[i]["like"] == true) {
        input.setAttribute('checked', '');
      }
    }
  }

  checkboxes.forEach((element, index) => {
    element.addEventListener("click", function (e) {
      let $this = e.currentTarget;
      let id = element.getAttribute('id');

      if ($this.checked) {
        newLike = {
          id: id,
          like: true
        };
        element.setAttribute('checked', '');
      } else {
        newLike = {
          id: id,
          like: false
        };
        element.removeAttribute('checked');
      }
      // актуализирую состояние инпута,
      checkboxData.splice(`${index}`, 1, newLike);
      //  и снова в локалсторадж
      localStorage.setItem('list', JSON.stringify(checkboxData));
    });
  }); // ============== checkboxes state end ================

  //  вывожу кол-во вакансий на страницу
  let totalVacancies = document.querySelectorAll('.totalVacancies');
  for (let i = 0; i < totalVacancies.length; i++) {
    totalVacancies[i].textContent = +checkboxes.length;
  }

  // ============== share start

  const shareButtons = document.querySelectorAll('[data-share="sharePosition"]');

  if (shareButtons.length > 0) {

    shareButtons.forEach((item) => {
      item.addEventListener('click', sharePositionURL)
    });
  }


  function sharePositionURL() {
    const shareData = {
      text: 'share',
      title: 'titleTitle',
      url: 'https://youtube.com',
    };

    if (navigator.share) {
      navigator.share(shareData)
        .then(() => {
          console.log('its ok');
        })
        .catch(console.error);
    } else {
      alert('current browser does not support  share api. Please manually share  the link');
    }
  } // ============== share end



  // ============== share start

  // const shareButton = document.getElementById('shareBtn');

  // if (shareButton) {
  //   const shareData = {
  //     text: 'share',
  //     title: 'titleTitle',
  //     url: 'https://youtube.com',
  //   };

  //   shareButton.addEventListener('click', event => {

  //     if (navigator.share) {
  //       navigator.share(shareData)
  //         .then(() => {
  //           console.log('its ok');
  //         })
  //         .catch(console.error)
  //     } else {
  //       alert('current browser does not support  share api. Please manually share  the link');
  //     }
  //   })
  // }
  // ============== share end

  //  SWHITCH LOCALISATION  SWHITCH LOCALISATION  SWHITCH LOCALISATION

  var swhithLang = document.querySelectorAll(
    ".langCheck__item:not(.selected) input"
  );
  swhithLang.forEach(function (item) {
    item.addEventListener("change", function () {
      var val = item.name;
      location.reload();
      document.cookie = `content_lang=${val}; max-age=3600`;
    });
  });

  //  SWHITCH LOCALISATION  SWHITCH LOCALISATION  SWHITCH LOCALISATION


  const modalBtn = document.querySelectorAll('[data-modal]');
  const modal = document.querySelectorAll('.modal');


  modalBtn.forEach(item => {
    item.addEventListener('click', event => {

      let $this = event.currentTarget;
      let modalId = $this.getAttribute('data-modal');

      let modal = document.getElementById(modalId);
      let modalWrapper = modal.querySelector('.popup__wrapper');

      modalWrapper.addEventListener('click', event => {
        event.stopPropagation();
      });

      modal.classList.add('show');

      setTimeout(function () {
        modalWrapper.style.transform = 'none';
      }, 1);
    });
  });

  modal.forEach(item => {
    item.addEventListener('click', event => {
      let currentModal = event.currentTarget

      closeModal(currentModal)
    });
  });

  function closeModal(currentModal) {
    let modalWrapper = currentModal.querySelector('.popup__wrapper');

    modalWrapper.removeAttribute('style');

    setTimeout(function () {
      currentModal.classList.remove('show');
    }, 300);
  }
});