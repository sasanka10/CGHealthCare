  
<form id="logoutForm" action="/logout" method="post">
    <div class="topbar">
        <div class="container">
                <div class="navbar-header">
                    <a href="/" ><h4>HMS</h4></a>
                </div>
                <!-- Topbar Navigation -->
                <ul class="loginbar pull-right">
                    <li>
                        <i class="fa fa-globe"></i>
                            | <a href="javascript:document.getElementById('logoutForm').submit()">Log off</a> | 
                            <a href="{% url 'login' %}">Log in</a> | 
                         <a href="#">Membership </a>  | 
                        <a href="#">About Us</a>  | 
                        <a href="#">Contact Us </a> 
                    </li>  
                </ul>
               
                <!-- End Topbar Navigation -->
        </div>
    </div>   
                  
</form>





