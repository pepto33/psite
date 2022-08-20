<?php include('persheader.php'); ?>
<br>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="profileTab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Профиль</a>
                <a class="nav-link" id="messagesTab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Сообщения</a>
                <a class="nav-link" id="settingsTab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Настройки</a>
                <a class="nav-link" id="userslistTab" data-toggle="pill" href="#v-pills-userslist" role="tab" aria-controls="v-pills-userslist" aria-selected="false">Пользователи</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row">
                        <div class="col-sm-3"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU" alt=""></div>
                        <div class="col-sm-9">
                            <h1 id="userName">Имя Фамилия</h1>
                            <h2>О себе</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum amet placeat optio aut reiciendis nemo odit quibusdam omnis soluta aliquam molestiae magnam, praesentium, modi quas cumque facere minus! Minima, exercitationem!
                                Dolore dolorem qui molestias. Iure quis impedit cupiditate omnis est harum voluptates temporibus illum deserunt, tempora ipsam, dicta, consequuntur natus voluptas ad id. Ex aliquam debitis reprehenderit a dolore necessitatibus!
                                Voluptatum rerum id officiis ipsam ipsum alias natus excepturi? Architecto ipsa dolorum doloribus molestiae. Doloribus cum maxime beatae magnam iusto vitae velit necessitatibus dolorum quasi, minima officiis, pariatur praesentium! Temporibus.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3"><img src="/img/gallery/r5.jpg" alt=""></div>
                                <div class="col-sm-9">
                                    <h5>Катерина Семенова</h5>
                                    <p>Привет. Да, я завтра смогу.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><img src="/img/gallery/r7.jpg" alt=""></div>
                                <div class="col-sm-9">
                                    <h5>Иван Иваныч</h5>
                                    <p>Отлично! Едем завтра на рыбалку</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-12 border">
                                    <div class="row">
                                        <div class="col-1"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU" alt="" width="100%"></div>
                                        <div class="col-11">Поехали завтра на рыбалку?</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><img src="/img/gallery/r7.jpg" alt="" width="100%"></div>
                                        <div class="col-11">Отлично! Едем завтра на рыбалку</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <textarea name="" id="" cols="60" rows="1"></textarea>
                                </div>
                                <div class="col-4"><button class="btn btn-warning">От править сообщение</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <p>Имя: <span>Василий</span><span>[Изменить]</span></p>
                    <p>Фамилия: <span>Пупкин</span><span>[Изменить]</span></p>
                    <p></p>
                </div>
                <div class="tab-pane fade" id="v-pills-userslist" role="tabpanel" aria-labelledby="v-pills-userslist-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Имя и Фамилия</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody id="userListTable">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script>
    let pathname = location.pathname.split("/")[2];
    let navLinks = document.querySelectorAll(".nav-link");
    let user;

    async function getUser() {
        let responce = await fetch("/getUser");
        return await responce.json();
    }
    async function getUsers() {
        let responce = await fetch("/getUsers");
        return await responce.json();
    }

    $(window).on("popstate", function(e) {
        let path = location.pathname.split("/")[2];
        if (path == "profile") {
            $('#profileTab').tab('show')
        } else if (path == "messages") {
            $('#messagesTab').tab('show')
        } else if (path == "settings") {
            $('#settingsTab').tab('show')
        } else if (path == "userslist") {
            $('#userslistTab').tab('show')
        }
    });
    if (pathname == "profile") {
        getUser().then(user => {
            userName.innerText = `${user.name} ${user.lastname}`;
        })
        $('#profileTab').tab('show')
    } else if (pathname == "messages") {
        $('#messagesTab').tab('show')
    } else if (pathname == "settings") {
        $('#settingsTab').tab('show')
    } else if (pathname == "userslist") {
        getUsers().then(users => {
            for (let i = 0; i < users.length; i++) {
                userListTable.insertAdjacentHTML('beforeend', `<tr>
                <th scope="row">${users[i].id}</th>
                <td>${users[i].name} ${users[i].lastname}</td>
                <td>${users[i].email}</td>
                </tr>`);
            }
        })
        $('#userslistTab').tab('show')
    } else {
        //           location.href = location.protocol + "//" + location.host;
    }
    for (let i = 0; i < navLinks.length; i++) {
        navLinks[i].addEventListener("click", () => {
            let page = navLinks[i].getAttribute("aria-controls").split("v-pills-")[1];
            history.pushState('', '', page);
            //        console.log(page);
        })
    }
    document.getElementById(pathname + "Tab").classList.add("active");
</script>


<?php include('persfooter.php') ?>