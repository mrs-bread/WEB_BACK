<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./scripts/slick.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet"  href="./styles/style.css">
    <link rel="stylesheet"  href="./styles/slick.css"> 
    <link rel="stylesheet"  href="./styles/header-style.css"> 
    <script src="./scripts/form.js" defer></script>
    <script src="./scripts/buttons.js" defer></script>
    <script src="./scripts/slider.js" defer></script>
    <script src="./scripts/linkunderline.js" defer></script>
    <title>Project</title>
</head>

<body>
<script>
  window.onload = function() {
    const element = document.getElementById('myform');
    element.scrollIntoView({ behavior: 'smooth' });
  };
</script>
<!--хэдер-->
    <div class="container-fluid page">
      <div class="b-header row d-flex mb-2">
        <header> 
           <div class="header__video">
              <video class="h-vid"  loop autoplay muted>
                  <source src="./styles/img/video.mp4" type="video/mp4">
              
              </video>
           </div>
          
          
                <div class="navigation row d-flex mt-5 ">
                  <div class="nav-cont container">
                      <nav class="navbar">
                        
                          <div class="logo-menu col-md-2 float-md-left order-1 order-md-0">
                            <a href="form.tpl.php">
                              <img id="logo" src="./styles/img/drupal-coder.svg" alt="" width="140" height="20">
                            </a>
                              <label class="" for="menu" id="menu1" style="background-image: url(../style/image/менюю.png);">≡</label>
                          </div>
                        
                        

                        <div class="col-md-12 col-lg-10 px-0 justify-content-around">
                            <input type="checkbox" name="menu" id="menu">
                            <ul class="menu-none p-0 py-md-0 m-md-0 w-md-auto">
                                <li class="li-menu py-2 px-3 float-md-left"> <a  href="index.html" class="nav-link p-0 text-md-center"> ПОДДЕРЖКА DRUPAL </a></li>

                                <li class="pt-2 pt-md-0 py-md-2 px-md-3 float-md-left">  
                                    <div class="dropdown">
                                        <form action="form.tpl.php" class="li-menu">
                                            <button class="dropbtn pb-2 pb-md-0 px-md-0 px-3"> АДМИНИСТРИРОВАНИЕ <img src="./styles/img/arrow-lang.svg" alt=""> </button>
                                        </form>
                                        <div class="dropdown-content">
                                            <a class="down-links li-menu py-2 px-5 px-md-3" href="form.tpl.php">МИГРАЦИЯ</a>
                                            <a class="down-links li-menu py-2 px-5 px-md-3" href="form.tpl.php">БЭКАПЫ</a>
                                            <a class="down-links li-menu py-2 px-5 px-md-3" href="form.tpl.php">АУДИТ БЕЗОПАСНОСТИ</a>
                                            <a class="down-links li-menu py-2 px-5 px-md-3" href="form.tpl.php">ОПТИМИЗАЦИЯ СКОРОСТИ</a>
                                            <a class="down-links li-menu py-2 px-5 px-md-3" href="form.tpl.php">ПЕРЕЕЗД НА HTTPS</a>
                                        </div>
                                    </div>
                                  </li>
                                  <li class="li-menu py-2 px-3 float-md-left"> <a  href="index.php" class="nav-link p-0 text-md-center"> ПРОДВИЖЕНИЕ</a></li>
                                  <li class="pt-2 py-md-2 px-md-3 float-md-left">  
                                        <div class="dropdown">
                                          <form action="form.tpl.php" class="li-menu">
                                              <button class="dropbtn pb-2 pb-md-0 px-md-0 px-3 pt-md-0"> О НАС <img src="./styles/img/arrow-lang.svg" alt=""> </button>
                                          </form>
                                        <div class="dropdown-content">
                                            <a class="down-links li-menu py-2 px-5 px-md-3" href="form.tpl.php">КОМАНДА</a>
                                            <a class="down-links li-menu py-2 px-5 px-md-3" href="form.tpl.php">ВАКАНСИИ</a>
                                        </div>
                                      </div> 
                                  </li>
                                  
                                  <li class="li-menu py-2 px-3 float-md-left"> <a  href="form.tpl.php" class="nav-link p-0 text-md-center"> ПРОЕКТЫ </a></li>
                                  <li class="li-menu py-2 px-3 float-md-left"> <a  href="form.tpl.php" class="nav-link p-0 text-md-center"> КОНТАКТЫ </a></li>
                              </ul>
                        </div>
                        
                        
                        
                    </nav>
                  </div>
                  

                <div class="container"> 
                <div class="header-cont container d-flex col-md-12 py-md-5 px-md-0 mx-md-0 my-4 ">
                    <div class="right-col col-md-6 pr-4 mr-md-4">
                      <div class="header-title">
                        Поддержка сайтов на Drupal
                      </div>
                        
                      <div class="header-text-info py-md-2">
                          Сопровождение и поддержка сайтов на CMS Drupal любых версий и запущенности
                      </div>
                        
                      <div class="button-tariff col-md-5 my-4 px-0">
                        <div class="block-main-wrapper">
                          <a href="#myform" class="block-main-btn flowing-scroll">РЕГИСТРАЦИЯ</a>
                        </div>

                      </div>

                    </div>
                    
                    <div class="row pl-2 ml-md-2">
                        <div class="advantages-header col-6 col-lg-4 my-3">
                          
                          <h1>#1 <img src="./styles/img/cup.png" alt=""></h1> 
                          <p class="">  Drupal-разрабочтик в России по версии Рейтинга Рунета </p>
                        </div>
                        <div class="advantages-header col-6 col-lg-4 my-3">
                          <h2>3+</h2><p class=""> средний опыт специалистов более 3 лет</p>
                          
                        </div>
                        <div class="advantages-header col-6 col-lg-4 my-3">
                          <h2>14</h2><p class=""> лет опыта в сфере Drupal </p>
                          
                        </div>
                        <div class="advantages-header col-6 col-lg-4 my-3">
                          <h2>50+</h2><p class=""> модулей и тем в формает DrupalGive</p>
                        </div>
                        <div class="advantages-header col-6 col-lg-4 my-3">
                          <h2>90 000+</h2><p class=""> часов поддержки на Drupal </p>
                          
                        </div>
                        <div class="advantages-header col-6 col-lg-4 my-3">
                          <h2>300+</h2><p class=""> Проектов на поддержке </p>
                          
                        </div>
                    </div>
                </div>
              </div>
          </div>
          

        </header>
      </div>
    </div>


  <!--main-->
  <div class="b-main">

    <div class="b-info-1 container">
      <h2 class="mb-3 px-3"> 13 лет совершенствуем <br> компетенции в Друпал <br> поддержке! </h2>
      <p class="mb-5 px-3"> Разрабатываем и оптимизируем модули, расширяем <br> функциональность сайтов, обновляем дизайн </p>

      <div class="row d-flex">

        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-2 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-1" src="./styles/img/competency-1.svg">
            </div>
            <p class="col-12 my-0 p-3"> Добавление информации на сайт, создание новых разделов</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-1 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-2" src="./styles/img/competency-2.svg">
            </div>
            <p class="col-12 my-0 p-3"> Разработка и оптимизация модулей сайта</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-1 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-3" src="./styles/img/competency-3.svg">
            </div>
            <p class=" col-12 my-0 p-3"> Интеграция с CRM, 1C, платежными системами, любыми веб-сервисами</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-1 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-4" src="./styles/img/competency-4.svg">
            </div>
            <p class="col-12 my-0 p-3"> Любые доработки функционала и дизайна</p>
          </div>
        </div>  
        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-1 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-5" src="./styles/img/competency-5.svg">
            </div>
            <p class="col-12 my-0 p-3"> Аудит и мониторинг безопасности Drupal сайтов</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-1 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-6" src="./styles/img/competency-6.svg">
            </div>
            <p class="col-12 my-0 p-3"> Миграция, импорт контента и апгрейд Drupal</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-1 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-7" src="./styles/img/competency-7.svg">
            </div>
            <p class="col-12 my-0 p-3"> Оптимизация и ускорение Drupal-сайтов</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mx-0 px-2">
          <div class="inf-1-block row d-flex justify-content-around m-1 p-2">
            <div class="inf-1-img col-12 d-flex justify-content-around">
              <img alt="comp-8" src="./styles/img/competency-8.svg">
            </div>
            <p class="col-12 my-0 p-3"> Веб-маркетинг, консультации и работы по SEO</p>
          </div>
        </div>
            
      </div>
    </div>

    <div class="container">
      <div class="b-info-2 col-12 mx-0 px-0 pb-5">
        <h2 class="block-name mb-4"> Поддержка <br> от Drupal-coder </h2>

        <div class="squares row d-flex p-0 mx-0">

          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-1" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">01.</div>
                <h3 class="square-title p-0 mb-3">Постановка задачи по Email</h3>
                <p class="square-body p-0 m-0"> Удобная и привычная модель постановки задач, при которой задачи фиксируются и никогда не теряются.</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-2" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">02.</div>
                <h3 class="square-title p-0 mb-3"> Система Helpdesk – отчетность, прозрачность </h3>
                <p class="square-body p-0 m-0"> Возможность посмотреть все заявки в работе и отработанные часы в личном кабинете через браузер.</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-3" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">03.</div>
                <h3 class="square-title p-0 mb-3"> Расширенная техническая поддержка </h3>
                <p class="square-body p-0 m-0"> Возможность организации расширенной техподдержки с 6:00 до 22:00 без выходных. </p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-4" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">04.</div>
                <h3 class="square-title p-0 mb-3"> Персональный менеджер проекта </h3>
                <p class="square-body p-0 m-0"> Ваш менеджер проекта всегда в курсе текущего состояния проекта и в любой момент готов ответить на любые вопросы. </p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-5" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">05.</div>
                <h3 class="square-title p-0 mb-3"> Удобные способы оплаты </h3>
                <p class="square-body p-0 m-0"> Безналичный расчет по договору или электронные деньги: WebMoney, Яндекс.Деньги, Paypal. </p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-6" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">06.</div>
                <h3 class="square-title p-0 mb-3"> Работаем с SLA и NDA </h3>
                <p class="square-body p-0 m-0"> Работа в рамках соглашений о конфиденциальности и об уровне качества работ. </p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-7" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">07.</div>
                <h3 class="square-title p-0 mb-3"> Штатные специалисты </h3>
                <p class="square-body p-0 m-0"> Надежные штатные специалисты, никаких фрилансеров. </p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-1 px-2">
            <div id="sq-8" class="square-wrapper px-3 pt-3 pb-5">
                <div class="square-num p-0 mb-3">08.</div>
                <h3 class="square-title p-0 mb-3"> Удобные каналы связи </h3>
                <p class="square-body p-0 m-0"> Консультации по телефону, скайпу, в месенджерах. </p>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="b-info-3 ">

        <div class="container">
          <div class="row">
            <div class="inf-3-body col-md-12 col-lg-6 col-xs-12 col-md-offset-6">
              <div class="row">
                <h2 class="col-12 mb-5 mt-3"> Экспертиза в Drupal, <br> опыт 14 лет! </h2>
              </div>

              <div class="row row-flex">

                <div class="col-sm-6 col-xs-12 inf-3-col">
                  <div class="inf-3-item">
                    <p>
                      Только системный подход – контроль версий, резервирование и тестирование!
                    </p>
                  </div>
                </div>

                <div class="col-sm-6 col-xs-12 inf-3-col">
                  <div class="inf-3-item">
                    <p>
                      Только Drupal сайты, не берем на поддержку сайты на других CMS!
                    </p>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12 inf-3-col">
                  <div class="inf-3-item">
                    <p>
                      Участвуем в разработке ядра Drupal и модулей на Drupal.org, разрабатываем
                      <a href="index.html"> свои модули Drupal</a>
                    </p>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12 inf-3-col">
                  <div class="inf-3-item">
                    <p>
                      Поддерживаем сайты на Drupal 5, 6, 7 и 8
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        
        <div class="side-image">
          <img alt="side-laptop" src="./styles/img/laptop.png">
        </div>
    </div>



    <div class="b-tarif col-12 row d-flex justify-content-around px-0 mx-0 pb-5 pt-3" id="tariffs">
      <div class="container">
        <h2 class="block-name col-12 order-0 mb-3 px-3"> Тарифы </h2>
        <div class="b-t row d-flex col-12 mx-0 px-0 justify-content-around">

          <div class="col-12 col-md-4 order-2 order-md-2 p-0">
            <div class="t-part row d-flex justify-content-around m-1 p-3">
              <div class="t-body col-12 p-0">
                <h3 class="col-12 mb-3 p-0"> Бизнес </h3>
                <ul class="my-3">
                  <li> Консультации и работы по SEO </li>
                  <li> Услуги дизайнера </li>
                  <li> Высокое время реакции - до 2 рабочих дней </li>
                  <li> Неиспользованные оплаченные часы не переносятся </li>
                  <li> Предоплата от 30 000 рублей в месяц </li>
                </ul>
              </div>
              <div class="col-12 t-button mx-0"> <button > СВЯЖИТЕСЬ С НАМИ! </button> </div>
            </div>
          </div>

          <div class="t-2 col-12 col-md-4 order-1 order-md-1 p-0">
            <div class="t-part-b row d-flex justify-content-around mx-1 mt-md-4 p-3">
              
              <div class="t-body col-12 p-0">
                <h3 class="col-12 mb-3 p-0"> Стартовый </h3>
                <ul class="my-3">
                  <li> Консультации и работы по SEO </li>
                  <li> Услуги дизайнера </li>
                  <li> Неиспользованные оплаченные часы переносятся на следующий месяц </li>
                  <li> Предоплата от 6 000 рублей в месяц </li>
                </ul>
              </div>
              <div class="col-12 t-button mx-0"> <button id="t-btn-b1"> СВЯЖИТЕСЬ С НАМИ! </button> </div>
            </div>
          </div>

          <div class="t-2 col-12 col-md-4 order-3 order-md-3 p-0">
            <div class="t-part-b row d-flex justify-content-around mx-1 mt-md-4 p-3">
              
              <div class="t-body col-12 p-0">
                <h3 class="col-12 mb-3 p-0"> VIP </h3>
                <ul class="my-3">
                  <li> Консультации и работы по SEO </li>
                  <li> Услуги дизайнера </li>
                  <li> Максимальное время реакции - в день обращения </li>
                  <li> Неиспользованные оплаченные часы не переносятся </li>
                  <li> Предоплата от 270 000 рублей в месяц </li>
                </ul>
              </div>
              <div class="col-12 t-button mx-0"> <button id="t-btn-b2"> СВЯЖИТЕСЬ С НАМИ! </button> </div>
            </div>
          </div>

        </div>
        <div class="tariffs-bot-text">
          <p class="col-12 my-3"> Вам не подходят наши тарифы? Оставьте заявку и мы предложим вам индивидуальные условия! </p>
          <a href="#myform" class="underlined" id="t-a"> ПОЛУЧИТЬ ИНДИВИДУАЛЬНЫЙ ТАРИФ </a>
        </div>
      </div>
    </div>


    <div class="b-info-4 container">
      <div class="row d-flex">
        <h2 class="col-12 order-0"> Наши профессиональные разработчики выполняют быстро любые задачи </h2>

        <div class="col-md-4 col-12 mx-0 px-2 d-flex justify-content-around">
          <div class="inf-4-block row d-flex justify-content-around m-2 p-2">
            <div class="inf-4-img col-12 d-flex justify-content-around">
              <img alt="c-1" src="./styles/img/competency-20.svg">
            </div>
            <h3 class="col-12"> от 1ч </h3>
            <p class="col-12"> Настройка события GA в интернет-магазине </p>
          </div>
        </div>
        <div class="col-md-4 col-12 mx-0 px-2 d-flex justify-content-around">
          <div class="inf-4-block row d-flex justify-content-around m-2 p-2">
            <div class="inf-4-img col-12 d-flex justify-content-around">
              <img alt="c-2" src="./styles/img/competency-21.svg">
            </div>
            <h3 class="col-12"> от 20ч </h3>
            <p class="col-12"> Разработка мобильной версии сайта </p>
          </div>
        </div>
        <div class="col-md-4 col-12 mx-0 px-2 d-flex justify-content-around">
          <div class="inf-4-block row d-flex justify-content-around m-2 p-2">
            <div class="inf-4-img col-12 d-flex justify-content-around">
              <img alt="c-3" src="./styles/img/competency-22.svg">
            </div>
            <h3 class="col-12"> от 8ч </h3>
            <p class="col-12"> Интеграция модуля оплаты </p>
          </div>
        </div>
          
      </div>
    </div>



    <div class="b-team container">
      <div class="row d-flex">
        <h2 class="block-name my-3 col-12 order-0"> Команда</h2>

        <div class="team-block col-6 col-md-4 row d-flex justify-content-around m-0">
          <img class="col-12 mb-3" alt="c-1" src="./styles/img/IMG_2472_0.jpg">
          <h3 class="col-12"> Сергей Синица </h3>
          <p class="col-12"> Руководитель отдела веб- разработки, канд. техн. наук, заместитель директора</p>
        </div>
        <div class="team-block col-6 col-md-4 row d-flex justify-content-around m-0">
          <img class="col-12 mb-3" alt="c-2" src="./styles/img/IMG_2539_0.jpg">
          <h3 class="col-12"> Роман Агабеков</h3>
          <p class="col-12"> Руководитель отдела DevOPS, директор</p>
        </div>
        <div class="team-block col-6 col-md-4 row d-flex justify-content-around m-0">
          <img class="col-12 mb-3" alt="c-3" src="./styles/img/IMG_2474_1.jpg">
          <h3 class="col-12"> Алексей Синица </h3> 
          <p class="col-12"> Руководитель отдела поддержки сайтов</p>
        </div>
        <div class="team-block col-6 col-md-4 row d-flex justify-content-around m-0">
          <img class="col-12 mb-3" alt="c-4" src="./styles/img/IMG_2522_0.jpg">
          <h3 class="col-12"> Дарья Бочкарёва</h3>
          <p class="col-12"> Руководитель отдела продвижения, контекстной рекламы и контент-поддержки сайтов</p>
        </div>
        <div class="team-block col-6 col-md-4 row d-flex justify-content-around m-0">
          <img class="col-12 mb-3"  alt="c-5" src="./styles/img/IMG_9971_16.jpg">
          <h3 class="col-12"> Ирина Торкунова</h3>
          <p class="col-12"> Менеджер по работе с клиентами</p>
        </div>

        <div class="btn-open col-12"> <button class="p-2" id="open-button"> ВСЯ КОМАНДА </button></div>
      </div>
    </div>


    <div class="b-case container my-3">
      <h2 class="block-name">Последние кейсы</h2>

      <div class="row d-flex">

        <article class="case-block col-12 col-md-4 p-0 m-0">
          <div class="case-wrapper m-2 px-3 pb-3 pt-0">
            <div class="case-img-wrapper">
              <a href="index.html"><img alt="case-1" src="./styles/img/case-1.png"></a>
            </div>
            <div class="p-3">
              <div class="mb-3">
                <h3 class="m-0"><a  class="case-title" href="index.html">Настройка кэширования данных. Апгрейд сервера. Ускорение работы сайта в 30 раз!</a></h3>
                <span ><a class="case-date" href="index.html">04.05.2020</a></span>
              </div>
            <p ><a class="case-text" href="index.html"> Влияние скорости загрузки страниц сайта на отказы и конверсии. Кейс ускорения...</a></p>
            </div>
          </div>
        </article>
        <article class="case-block col-12 col-md-8 p-0 m-0 d-flex">
          <div class="case-wrapper-2 my-2 mx-4 mx-md-2 px-0">
              <div class="case-img-wrapper-2 m-0 p-0">
                <a href="index.html"><img alt="case-2" src="./styles/img/case-2.png"></a>
              </div>
              <div class="case-2-text px-4 px-md-3 py-5">
                <h3 class="m-0"><a  class="case-2-title" href="index.html">Использование отчетов Ecommerce в Яндекс.Метрике</a></h3>
              </div>
            </div>
        </article>
        <article class="case-block col-12 col-md-4 p-0 m-0 d-flex">
          <div class="case-wrapper-2 my-2 mx-4 mx-md-2 px-0">
              <div class="case-img-wrapper-2 m-0 p-0">
                <a href="index.html"><img alt="case-3" src="./styles/img/case-3.png"></a>
              </div>
              <div class="case-2-text px-4 px-md-3 py-4">
                <h3 class="m-0"><a  class="case-2-title" href="index.html">Повышение конверсии страницы с формой заявки с применением AB-тестирования</a></h3>
              <span ><a class="case-2-date" href="index.html">24.01.2020</a></span>
              </div>
            </div>
        </article>
        <article class="case-block col-12 col-md-4 p-0 m-0 d-flex">
          <div class="case-wrapper-2 my-2 mx-4 mx-md-2 px-0">
              <div class="case-img-wrapper-2 m-0 p-0">
                <a href="index.html"><img alt="case-4" src="./styles/img/case-4.png"></a>
              </div>
              <div class="case-2-text px-4 px-md-3 py-4">
                <h3 class="m-0"><a  class="case-2-title" href="index.html">Drupal 7: ускорение времени генерации страниц интернет-магазина на 32%</a></h3>
                <span ><a class="case-2-date" href="index.html">23.09.2019</a></span>
              </div>
            </div>
        </article>
        <article class="case-block col-12 col-md-4 p-0 m-0">
          <div class="case-wrapper m-2 px-3 pb-3 pt-0">
            <div class="case-img-wrapper">
              <a href="index.html"><img alt="case-5" src="./styles/img/case-5.png"></a>
            </div>
            <div class="p-3">
              <div class="mb-3">
                <h3 class="m-0"><a  class="case-title" href="index.html">Обмен товарами и заказами интернет-магазинов на Drupal 7 с 1С: Предприятие, МойСклад, Класс365</a></h3>
                <span ><a class="case-date" href="index.html">22.08.2019</a></span>
              </div>
            <p ><a class="case-text" href="index.html">Опубликован <span class="case-additional-text">релиз модуля...</span></a></p>
            </div>
          </div>
        </article>

      </div>
    </div>

    <div class="rev-wrapper">
      <div class="container">
        <div class="b-reviews">
          <h2 class="block-name mb-5"> Отзывы </h2>

          <div class="view-slider mt-5 ">
            <div class="b-slider p-4 mx-lg-5 mx-2 row d-flex">
              <div class="single-item col-12 col-md-8">

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-1" src="./styles/img/logo_0.png">
                  <div class="slide-body">
                    Долгие поиски единственного и неповторимого мастера на многострадальный сайт www.cielparfum.com, 
                    который был собран крайне некомпетентным программистом и раз в месяц стабильно грозил погибнуть,
                    привели меня на сайт и, в итоге, к ребятам из Drupal-coder. И вот уже практически полгода как не 
                    проходит и дня, чтобы я не поудивлялась и не порадовалась своему везению! Починили все, что не 
                    работало - от поиска до отображения меню. Провели редизайн - не отходя от желаемого, но со своими 
                    существенными и качественными дополнениями. Осуществили ряд проектов - конкурсы, тесты и тд. А уж 
                    мелких починок и доработок - не счесть! И главное - все качественно и быстро (не взирая на не 
                    самый "быстрый" тариф). Есть вопросы - замечательный Алексей всегда подскажет, поддержит, 
                    отремонтирует и/или просто сделает с нуля. Есть задумка для реализации - замечательный Сергей 
                    обсудит и предложит идеальный вариант. Есть проблема - замечательные Надежда и Роман починят, 
                    поправят, сделают! Ребята доказали, что эта CMS - мощная и грамотная система управления. Надеюсь, 
                    что наше сотрудничество затянется надолго! Спасибо!!!
                  </div>
                  <div class="slide-bot">
                    С уважением, Наталья Сушкова руководитель Отдела веб-проектов Группы компаний «Си Эль парфюм» 
                    <a href="http://www.cielparfum.com/" tabindex="0">http://www.cielparfum.com/</a>
                  </div>
                </div>

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-2" src="./styles/img/logo_2.png">
                  <div class="slide-body">
                    text
                  </div>
                  <div class="slide-bot">
                    text
                    <a href="http://www.cielparfum.com/" tabindex="0"> url </a>
                  </div>
                </div>

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-3" src="./styles/img/logo-estee.png">
                  <div class="slide-body">
                    text
                  </div>
                  <div class="slide-bot">
                    text
                    <a href="http://www.cielparfum.com/" tabindex="0"> url </a>
                  </div>
                </div>

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-4" src="./styles/img/logo.png">
                  <div class="slide-body">
                    text
                  </div>
                  <div class="slide-bot">
                    text
                    <a href="http://www.cielparfum.com/" tabindex="0"> url </a>
                  </div>
                </div>

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-5" src="./styles/img/farbors_ru.jpg">
                  <div class="slide-body">
                    text
                  </div>
                  <div class="slide-bot">
                    text
                    <a href="http://www.cielparfum.com/" tabindex="0"> url </a>
                  </div>
                </div>

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-6" src="./styles/img/lpcma_rus_v4.jpg">
                  <div class="slide-body">
                    text
                  </div>
                  <div class="slide-bot">
                    text
                    <a href="http://www.cielparfum.com/" tabindex="0"> url </a>
                  </div>
                </div>

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-7" src="./styles/img/nashagazeta_ch.png">
                  <div class="slide-body">
                    text
                  </div>
                  <div class="slide-bot">
                    text
                    <a href="http://www.cielparfum.com/" tabindex="0"> url </a>
                  </div>
                </div>

                <div class="slide p-2 col-12 col-md-8">
                  <img class="mb-4" alt="rev-logo-8" src="./styles/img/cableman_ru.png">
                  <div class="slide-body">
                    text
                  </div>
                  <div class="slide-bot">
                    text
                    <a href="http://www.cielparfum.com/" tabindex="0"> url </a>
                  </div>
                </div>

              </div>

              <nav class="slick-arrow-wrapper col-12 col-md-4 p-3 d-flex justify-content-around">
                <div class="slick-arrow d-flex" >
                  <button id="my-arrow-prev" class="slick-prev slick-arrow" aria-label="Previous" type="button">Previous</button>
                  <span class="slide-num px-3 py-2">
                    <span class="slide-num-current" id="slide-current-number">01</span> / 08
                  </span>
                  <button id="my-arrow-next" type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" >Next</button>
                </div>
              </nav>

            </div>
          </div>
        </div>
      </div>
    </div>
      

    <div class="b-slider-2">
      <div class="slider-2-head container">
        <h2 class="block-name px-5"> С нами работают </h2>
        <p class="px-2"> Десятки компаний доверяют нам самое ценное, что у них есть в интернете - 
            свои сайты. Мы делаем всё, чтобы наше сотрудничество было долгим.
        </p>
      </div>
        
      <div class="auto-slider-1-wrapper">
        <div class="auto-slider-1">
          <div class="slider-1">

            <div class="slide-2-1 d-flex justify-content-around">
              <img alt="slide-2-logo-1" src="./styles/img/logo-2-1.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-2" src="./styles/img/logo-2-2.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-3" src="./styles/img/logo-2-3.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-4" src="./styles/img/logo-2-4.png">
            </div>
            <div class="slide-2-1 d-flex justify-content-around">
              <img alt="slide-2-logo-1" src="./styles/img/logo-2-1.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-2" src="./styles/img/logo-2-2.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-3" src="./styles/img/logo-2-3.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-4" src="./styles/img/logo-2-4.png">
            </div>

          </div>
        </div>
      </div>

      <div class="auto-slider-1-wrapper">
        <div class="auto-slider-1">
          <div class="slider-2">

            <div class="slide-2-1 d-flex justify-content-around">
              <img alt="slide-2-logo-1" src="./styles/img/logo-2-1.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-2" src="./styles/img/logo-2-2.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-3" src="./styles/img/logo-2-3.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-4" src="./styles/img/logo-2-4.png">
            </div>
            <div class="slide-2-1 d-flex justify-content-around">
              <img alt="slide-2-logo-1" src="./styles/img/logo-2-1.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-2" src="./styles/img/logo-2-2.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-3" src="./styles/img/logo-2-3.png">
            </div>
            <div class="slide-2-1">
              <img alt="slide-2-logo-4" src="./styles/img/logo-2-4.png">
            </div>

          </div>
        </div>
      </div>
    </div>

    
    <div class="container">
      <div class="b-accordion">
        <h2 class="block-name mb-4"> FAQ </h2>

        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">1.</h4>
            <h3 class="p-1 mb-1">Кто непосредственно занимается поддержкой?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">2.</h4>
            <h3 class=" p-1 mb-1">Как организована работа поддержки?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">3.</h4>
            <h3 class="p-1 mb-1">Что происходит, когда отработаны все предоплаченные часы за месяц?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">4.</h4>
            <h3 class="p-1 mb-1">Что происходит, когда не отработаны все предоплаченные часы за месяц?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">5.</h4>
            <h3 class="p-1 mb-1">Как происходит оценка и согласование планируемого времени на выполнение заявок?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">6.</h4>
            <h3 class="p-1 mb-1">Сколько программистов выделяется на проект?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">7.</h4>
            <h3 class="p-1 mb-1">Как подать заявку на внесение изменений на сайте?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">8.</h4>
            <h3 class="p-1 mb-1">Как подать заявку на добавление пользователя, изменение настроек веб-сервера и других задач по администрированию?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">9.</h4>
            <h3 class="p-1 mb-1">В течение какого времени начинается работа по заявке?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">10.</h4>
            <h3 class="p-1 mb-1">В какое время работает поддержка?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">11.</h4>
            <h3 class="p-1 mb-1">Подходят ли услуги поддержки, если необходимо произвести обновление ядра Drupal или модулей?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        <div class="p-2">
          <div class="d-flex">
            <h4 class="q-num p-1 mb-1 mt-1">12.</h4>
            <h3 class="p-1 mb-1">Можно ли пообщаться со специалистом голосом или в мессенджере?</h3>
          </div>
          <p class="pl-4">Сайты поддерживают штатные сотрудники ООО «Инитлаб», г.Краснодар, прошедшие специальное обучение
            и имеющие опыт работы с Друпал от 4 до 15 лет: 8 web-разработчиков, 2 специалиста по SEO, 4 системных администратора.</p>
        </div>
        
      </div>
    </div>

  </div>
    
<!--footer-->
<footer>
  <div class="bottom-wrapper container">
  
    <div class="b-bottom col-12 row d-flex pb-3 px-0 mx-0">
      <div class="b-footer-text col-md-6 order-1 order-md-1 col-12 p-3">
        <h2 class="block-name mb-3"> Оставить заявку на <br> поддержку сайта</h2>
        <p> Срочно нужна поддержка сайта? 
          Ваша команда не успевает справиться самостоятельно или предыдущий подрядчик не справился с работой?
           Тогда вам точно к нам! 
          Просто оставьте заявку и наш менеджер с вами свяжется! </p>

          <br>
          <div class="b-footer-info p-0">
            <span> <img src="./styles/img/phone.svg" alt="phone-sign" height="25" width="25"> 8 800 222-26-73 </span><br>
            <a href="index.html"> <img src="./styles/img/mail.svg" alt="mail-sign" height="25" width="25">info@drupal-coder.ru </a>
          </div>
      </div>


      <div class="b-form col-12 col-md-6 order-2 order-md-2 px-3 pb-3 pt-1 pt-md-3">

        <div class="error_messages" <?php if (empty($messages)) {print 'display="none"';} else {print 'display="block"';} ?>>

          <?php
          if (!empty($messages)) {
            print('<div id="messages">');
            foreach ($messages as $message) {
              print($message);
            }
            print('</div>');
          }
          ?>

        </div>


        <div class="formstyle1" > 
          <form id="myform" class="application" method="POST" action="">

            <h2 class="white-text" > ФОРМА </h2> 
            <input class="input-field" type="hidden" name="uid" value='<?php print isset($values['uid']) ? $values['uid'] : ''; ?>' />
            <label> 
              ФИО: <br/>
              <input class="input-field" name="fio" <?php if ($errors['fio'] ) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" />
            </label> <br/>

            <label> 
              Номер телефона: <br />
              <input class="input-field" name="number" type="tel" 
              <?php if ($errors['number']) {print 'class="error"';} ?> value="<?php print $values['number']; ?>"/>
            </label> <br/>
            <p class="numtext"> *используйте телефонный код +7</p>

            <label>
              E-mail: <br/>
              <input class="input-field" name="email" type="email" 
              <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>"/>
            </label> <br/>

            <label> 
              Дата рождения: <br/>
              <input class="input-field" name="birthdate" type="date" 
              <?php if ($errors['bdate']) {print 'class="error"';} ?> value="<?php print $values['bdate']; ?>"/>
            </label> <br/>
          
            <label class="white-text">
                Пол: <br /> 
                <label> <input type="radio" name="radio-group-1" value="male" 
                <?php if ($errors['gen']) {print 'class="error"';} ?>
                <?php if ($values['gen']=='male') {print 'checked="checked"';} ?>/> Мужской </label>
                <label> <input type="radio"  name="radio-group-1" value="female" 
                <?php if ($errors['gen']) {print 'class="error"';} ?>
                <?php if ($values['gen']=='female') {print 'checked="checked"';} ?>/> Женский</label> <br/>
            </label>

          

          <?php 
          $user_languages = explode(",",  $values['lang']);
          ?>

          <label > 
            Любимый язык программирования: <br/>
            <select  name="languages[]" multiple="multiple" 
            <?php if ($errors['lang']) {print 'class="error"';} ?> >

            <?php 
              foreach ($allowed_lang as $lang => $value) {
                printf('<option value="%s" ', $lang);
                if(in_array($lang, $user_languages)) {
                  print 'selected="selected"';
                }
                printf('>%s</option>', $value);
              }
            ?>
            
            </select>
          </label> <br/>

          <label>
            Биография: <br/>
            <textarea class="input-field" name="biography" <?php if ($errors['bio']) {print 'class="error"';} ?>><?php print $values['bio']; ?></textarea>
          </label> <br/>
          <label class="form-checkbox pl-2">
            <input type="checkbox" name="checkbox"
            <?php if ($errors['checkbox']) {print 'class="error"';} ?>  <?php if (!$errors['checkbox']) {print 'checked="checked"';} ?>/> 
            С контрактом ознакомлен 
          </label> <br/>
          <input class="submit-btn" type="submit" value="Сохранить" id="submit-btn"/>
          </form>
            <div>
                <a class="admin_ref" href="<?php echo url('admin'); ?>">Войти как администратор</a> <br>
            </div>

          <?php 
          require_once './scripts/db.php';
          global $db;
            if(!isset($_COOKIE[session_name()]) || empty($_SESSION['login'])){
              print('<a href="' . url('login') . '">Войти</a>');
            }
            if (isset($_COOKIE[session_name()]) && !empty($_SESSION['login'])) {
              print('<form class="logout_form" action="' . url('logout') . '" method="POST">
                  <input id="logoutButton" type="submit" name="logout" value="Выйти"/>
              </form>');
          }
          ?>
        </div>
      </div>
    </div>
    <div class="ftr col-12 order-3 order-md-3">
      <div class="footer-body p-0">
        <ul class="sns-wrapper row d-flex px-3">
          <li class="sns"><a title="Facebook" href="index.html"><img alt="logo-fb" src="./styles/img/logo-facebook.png"></a></li>
          <li class="sns"><a title="Вконтакте" href="index.html"><img alt="logo-vk" src="./styles/img/logo-vk.png"></a></li>
          <li class="sns"><a title="Telegram" href="index.html"><img alt="logo-tg" src="./styles/img/logo-telegram.png"></a></li>
          <li class="sns"><a title="YouTube" href="index.html"><img alt="logo-yt" src="./styles/img/logo-youtube.png"></a></li>
        </ul>
        ООО «Инитлаб», Краснодар, Россия. <br>
        Drupal является зарегистрированной торговой маркой Dries Buytaert.
      </div>
    </div>
  </div>
</footer>
</body>
</html>