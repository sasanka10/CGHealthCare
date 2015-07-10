
      <div class="row">
        <div class="col-md-6 margin-bottom-10">
      <?php  $whatINeed = explode("/", $_SERVER['PHP_SELF']);
            $_SESSION['host'] = $_SERVER['HTTP_HOST'];
            $_SESSION['rootNode'] = $whatINeed[1];
            
            ?>   
            <input type="hidden" id="host" value="<?php   print( $_SERVER['HTTP_HOST']);     ?>" />  
            <input type="hidden" id="rootnode" value="<?php print_r($whatINeed[1]);?>" />
                 <!-- Owl Carousel v3 -->
            <div class="col-md-13">
                <div class="col-md-6">
                <ul class="list-group sidebar-nav-v1" id="sidebar-nav">
                    <!-- Typography -->
                    <li class="list-group-item list-toggle">                   
                        <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse-typography">Disease</a>
                        <ul id="collapse-typography" class="collapse">
                            <li><a href="#">Symptoms</a></li>
                            <li>
                                <a href="#">Precautions</a>
                            </li>
                            <li>                           
                                <a href="#"> Dividers</a>
                            </li>
                            <li><a href="#">Side effects </a></li>
                            <li>                           
                                <a href="#">Food taken</a>
                            </li>
                            <li><a href="#"> Food avoids</a></li>                            
                        </ul>
                    </li> 
                    
                    <li class="list-group-item"><a href="#">Pregnancy care</a></li> 
                    
                    <li class="list-group-item"><a href="#">Child care</a></li> 
                   
                    <li class="list-group-item"><a href="#"> Old age care</a></li> 
                    
                    <li class="list-group-item"><a href="#">Nutrition</a></li> 
                  
                    <li class="list-group-item"><a href="#">Yoga</a></li> 
                   
                    <li class="list-group-item"><a href="#">Meditation</a></li> 
                  
                    <li class="list-group-item"><a href="#">Rejected Medicine list</a></li> 
                </ul>
                </div>
         <div class="col-md-13">        
           
                 <div class="col-md-10">
                      <hr>
                    <button class="btn btn-block btn-bitcoin-inversed rounded"  data-toggle="modal" data-target=".bs-example-modal-sm">
                      <i class="fa fa-bitcoin"></i>  Book Appointment 
                    </button>
                  </div>
                 
                 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 id="myLargeModalLabel" class="modal-title">Message ! </h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Please register or login in to application for booking a appointment</p>
                                    </div>
                                </div>
                            </div>
                        </div> 
             
             
             
             
         </div>      
         </div>  
                 
        </div>
                 <!-- Owl Carousel v3 -->
                
                 
                <!-- End Owl Carousel v3 -->
                    
    
                   
           <div class="col-md-4">
                
              <div class="fade in" id="errorblock">
                <p class="validation-summary-errors"><span id="errorlist"></span></p>
              </div>
                <form class="reg-page" method="post" action="." id="loginform">
                    
                    <div class="reg-header">            
                        <h2>Login to your account</h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" id="username" placeholder="Username" class="form-control  state-success">
                        
                         
                    </div>                    
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" id="password" placeholder="Password" class="form-control  state-success">
                    </div>                    

                    <div class="row">
                        <div class="col-md-6">
                            <label class="checkbox"><input type="checkbox"> Stay signed in</label>                        
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="next" value="/lredirect" />
                            <input type="button" value="Log in" id="login" class="btn-u" />
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" name="next" value="/register" />
                             <input type="button" value="Register" id="register" class="btn-u pull-right"  data-toggle="modal" data-target="#responsive"/>
                        </div>
                    </div>

                    {Note : Please enter your user name and password for registering.}
                    <hr>    
                    <h4>Forget your Password ?</h4>
                     <p>no worries, <a class="color-green" href="#"   data-toggle="modal" data-target="#changepassword">click here</a> to reset / forget your password.</p>
               
            </form>           
            </div>
   
  <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Register to Application</h4>
            </div>
        
          
        <form id="registerform" action="#" method="post" class="sky-form">   
            <div class="modal-body">
                <div class="row">  
                    <div class="col-md-10" id="errorRBlock">
                        <p class="validation-summary-errors">
                            <font color="red">
                                <span id="errorDisplay"></span>
                            </font>
                         </p> 
                    </div> 
                </div>     
              
                <div class="row col-md-6"><!--div class="col-md-6"-->
                      <fieldset>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" id="newuser" placeholder="Name" >
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                          
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input type="password" id="newuserpassword" placeholder="Password"  >
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                        
                       </fieldset> 
                        <fieldset>
                    
                             <section>
                                 <label class="input">
                                    <i class="icon-append fa fa-lock"></i>
                                    <input type="text" id="name" placeholder="Name"  >
                                </label>
                                    <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                        </fieldset>
                </div>
                     <fieldset>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" id="email" placeholder="Email" >
                                  <font color="red"><i><span id="emailErrmsg"></span></i></font>
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" id="mobile" placeholder="Mobile # {User ID }">
                            </label>
                            
                            <font color="red"><i><span id="errmsg"></span></i></font>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>  
                       </fieldset> 
                     <fieldset>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <label class="textarea">
                                    <i class="icon-append fa fa-comment"></i>
                                    <textarea rows="3" placeholder="Contact Address" id="address"></textarea>
                                </label>
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                        <section>
                             <label class="select">
                                <select id="profession" class="form-control">
                                 <option value="">-- Select Profession --</option>
                                <option value="doctor">Doctor</option>
                                 <option value="hosiptal">Hosiptal</option>
                                 <option value="staff">Hosiptal Staff</option>
                                 <option value="others">Others</option> 
                                </select>
                                <i></i>
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>  
                       </fieldset> 
            </div>
        </form>     
            <div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                 <input type="submit" value="Register User"class="btn-u btn-u-primary" id="registeruser"/>
                
            </div>
        </div>
    </div>
</div>
      
      <!-- Change Password -->
      
 <div class="modal fade" id="changepassword" tabindex="1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel1">Change / Forget Password</h4>
            </div>
        
          
        <form id="changePassword" action="#" method="post">   
            <div class="modal-body">
                <div class="row">  
                    <div class="col-md-10" id="errorRBlock">
                        <p class="validation-summary-errors">
                            <font color="red">
                                <span id="errorDisplay"></span>
                            </font>
                         </p> 
                    </div> 
                </div>     
                <div class="row">  
                    <div class="col-md-10" id="errorRBlock">
                        <hr/>
                    </div>    
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group margin-bottom-20">
                         <span class="input-group-addon"><i class="fa fa-user"></i></span>
                         <input type="text" id="changeuserid" placeholder="User ID" class="form-control  state-success" required>
                        </div>                    
                      
                    </div>
                    <div class="col-md-6">
                        <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" id="oldpassword" placeholder="Old Password" class="form-control  state-success" required>
                        
                        </div>                    
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="newpassword" placeholder="New Password" class="form-control  state-success" required>
                        </div>   
                    </div>
                    
                </div>    
            </div>
        </form>     
            <div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                 <input type="submit" value="Change / Forget Password"class="btn-u btn-u-primary" id="changepassword"/>
                
            </div>
        </div>
    </div>
</div>       
      </div>      
      <!-- End of Password -->
      
      
      
      
        </div><!--/row-->
    </div>
