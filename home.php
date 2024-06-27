<?php
    // FOR NOW THIS WILL BE THE HOME DASHBOARD. wE'LL CUSTOMIZE IT AS THE APP GROWS

?>

<div class="container">
    <!-- Sidebar Section  -->
     <aside>
        <div class="toggle">
            <div class="logo">
                <img src="images/logo.png">
                <h2>Rental<span class="danger">Magari</span></h2>
            </div>

            <div class="close" id="close-btn">
                <span class="material-symbols-outlined">close</span>
            </div>
        </div>

        <div class="sidebar">
            <a href="#">
                <span class="material-symbols-outlined">
                    dashboard
                </span>
                <h3>Dashboard</h3>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">
                    group
                </span>
                <h3>Users</h3>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">
                    insights
                </span>
                <h3>Analytics</h3>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">
                    menu_book
                </span>
                <h3>Bookings</h3>
                <span class="message-count">27</span>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">
                    inventory
                </span>
                <h3>Sale List</h3>
            </a>
        </div>
     </aside>


     <!-- Main Content  -->
      <main>
        <h1>Analytics</h1>
        <!-- Analyses  -->

        <div class="analyze">
            <div class="sales">
                <div class="status">
                    <div class="info">
                        <h3>Total Sales</h3>
                        <h1>$65,024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>+82%</p>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="visits">
                <div class="status">
                    <div class="info">
                        <h3>Site Visits</h3>
                        <h1>24,982</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>48%</p>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="searches">
                <div class="status">
                    <div class="info">
                        <h3>Seearches</h3>
                        <h1>14,271</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>21%</p>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <!-- End of Analyses  -->

        <!-- New Users  -->
        <div class="new-users">
            <h2>New Users</h2>
            <div class="user-list">
                <div class="user">
                    <img src="images/profile-2.jpg">
                    <h2>Jack</h2>
                    <p>54 Min ago</p>
                </div>
                <div class="user">
                    <img src="images/profile-3.jpg">
                    <h2>Amir</h2>
                    <p>3 Hours ago</p>
                </div>
                <div class="user">
                    <img src="images/profile-4.jpg">
                    <h2>Ember</h2>
                    <p>54 min ago</p>
                </div>
                <div class="user">
                    <img src="images/plus.png">
                    <h2>More</h2>
                    <p>New User</p>
                </div>
            </div>
        </div>
        <!-- End of New Users  -->

      </main>
</div>