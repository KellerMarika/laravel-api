    <aside class="navigation top-0 bottom-0 start-0">

        <ul class=" top-0 start-0 w-100 ps-1 d-flex flex-column">
            {{--        <p class="nav-title fs-3">MENU</p> --}}

            {{-- HOME NO --}}

                 <li id="home " class="list w-100 ">
                <b></b>
                <b></b>
                <a class="p-relative w-100 text-decoration-none " href="#">
                    <span class="icon text-cemter pt-2 d-block">
                        <ion-icon class="fs-3" name="home-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">Home</span>
                </a>
            </li> 
            <li id="profile" class="{{ !$user->is_superadmin ? 'active' : '' }}  list w-100  d-block">
                <b></b>
                <b></b>
                <a class="p-relative w-100 text-decoration-none " href="#">
                    <span  class="icon text-cemter pt-2 d-block ">
                        <ion-icon class="fs-3" name="person-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">Profile</span>
                </a>
            </li>

            @if ($user->is_superadmin)
                <li id="admin-dashboard"  class="list active w-100 d-block">
                    <b></b>
                    <b></b>
                    <a class="p-relative w-100 text-decoration-none " href="#">
                        <span class="icon text-cemter pt-2 d-block">
                            <ion-icon class="fs-3" name="stats-chart-outline"></ion-icon>
                        </span>
                        <span class="title d-block p-relative ps-3">Stat</span>
                    </a>
                </li>

                <li id="portfolio" class="list w-100 ">
                    <b></b>
                    <b></b>
                    <a  class="p-relative w-100 text-decoration-none " href="#">
                        <span class="icon text-cemter pt-2 d-block">
                            <ion-icon class="fs-3" name="images-outline"></ion-icon>
                        </span>
                        <span class="title d-block p-relative ps-3">Portfolio</span>
                    </a>
                </li>
            @endif

            <li id="messages"  class="list w-100 ">
                <b></b>
                <b></b>
                <a class="p-relative w-100 text-decoration-none " href="#">
                    <span class="icon text-cemter pt-2 d-block">
                        <ion-icon class="fs-3" name="mail-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">messages</span>
                </a>
            </li>

            <li id="setting" class="list w-100  ">
                <b></b>
                <b></b>
                <a  class="p-relative w-100 text-decoration-none " href="#">
                    <span class="icon text-cemter pt-2 d-block">
                        <ion-icon class="fs-3" name="settings-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">setting</span>
                </a>
            </li>
        </ul>
    </aside>

    {{-- menu --}}
    <div class="toggle">
        <ion-icon name="menu-outline" class="open"></ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
    </div>


    {{-- SET ACTIVE TO TOGGLE AND LIST ITEMS --}}

    <script type="text/javascript">
        let menuToggle = document.querySelector('.toggle')
        let Navigation = document.querySelector('.navigation')

        let active_Section
        menuToggle.onclick = function() {
            menuToggle.classList.toggle('active')
            Navigation.classList.toggle('active')

        }

        let list = document.querySelectorAll('.list');

        for (let i = 0; i < list.length; i++) {
            list[i].onclick = function(e) {
                console.log(e);
                console.log(e.srcElement.id);
                console.log(e.target);
                console.log(e.target.parentElement.id);
                let j = 0;
                while (j < list.length) {
                    list[j++].className = 'list'
                }
                list[i].className = 'list active';
            }
        }
    </script>


    {{-- icone --}}

    {{-- ho grossomodo capito ma --}}
    {{--     <script type="text/javascript">
        $(document).ready(function() {
            $(".open").click(function() {
                $(".nav-title").css('display', 'block');

            });
            $(".close").click(function() {
                $(".nav-title").css('display', 'none');
            });
        });
    </script> --}}
