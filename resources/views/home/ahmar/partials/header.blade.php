
    <header class="header">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                <img src="./assets/images/logo.png" alt="Logo" />
            </div>
            <!-- Navigation -->
            <nav class="nav">
                <ul>
                    <li class="active"><a href="#">ACCUEIL</a></li>
                    <li><a href="#">À PROPOS</a></li>
                    <li><a href="#">NOS PROGRAMMES</a></li>
                    <li><a href="#">BOUTIQUE</a></li>
                </ul>
            </nav>
            <!-- Right Section -->
            <div class="right-section">
                <a href="#" class="login-button">
                    <i class="fa-solid fa-user"></i>
                    <span>SE CONNECTER</span>
                </a>                
            </div>
            <button class="menu-toggle" id="menuToggle">☰</button>
        </div>
    </header>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="#" class="login-button">
                <i class="fa-solid fa-user"></i>
                <span>SE CONNECTER</span>
            </a>
        
            <button class="close-btn" id="closeSidebar">✖</button>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#home">Accueil</a></li>
            <li class="active"><a href="#about">À Propos</a></li>
            <li><a href="#programs">Nos Programmes</a></li>
            <li><a href="#shop">Boutique</a></li>
        </ul>
        <div class="sidebar-footer">
            <select class="language-select">
                <option value="fr">Français</option>
                <option value="en">Anglais</option>
            </select>
        </div>
    </aside>

    <script>
        // JavaScript to toggle the sidebar
        document.addEventListener("DOMContentLoaded", function () {
            const sidebar = document.getElementById("sidebar");
            const menuToggle = document.getElementById("menuToggle");
            const closeSidebar = document.getElementById("closeSidebar");

            // Open sidebar
            menuToggle.addEventListener("click", function () {
                sidebar.classList.add("open");
            });

            // Close sidebar
            closeSidebar.addEventListener("click", function () {
                sidebar.classList.remove("open");
            });

            // Close sidebar when clicking outside
            document.addEventListener("click", function (event) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove("open");
                }
            });
        });

    </script>