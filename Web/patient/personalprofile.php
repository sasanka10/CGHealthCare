
<div class="col-md-9">
        <div class="row margin-bottom-40">
             <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Profile
                               
                                </h3>
                                 
                            </div>
<div class="panel-body"> 
<form  id="profile-form" action="." method="post">

          <div class="col-md-6 sky-form">
                 <header>Personal Details
                    <button type="button" class="btn-u pull-right"  name="button" id="btnSubmit"   data-toggle="modal" data-target="#responsive">Edit</button>
                </header>
                <fieldset>

                          <section>
                              <label class="label">Name</label>
                              <label class="input">
                                  <!--i class="icon-append fa fa-user"></i>
                                  <input type="text" name="name"  placeholder="Name"-->
                                   <b><i><?php  echo $result[0]->username; ?></i></b>
                              </label>
                          </section>

                          <section>
                              <label class="label">Mobile #</label>
                              <label class="input">
                                  <!--i class="icon-append fa fa-phone"></i>
                                  <input type="mobile" name="mobile"  placeholder="Mobile #"-->
                                  <b><i><?php  echo $result[0]->mobile; ?></i></b>
                              </label>

                          </section>



                          <section>
                              <label class="label">Email Id
                             </label>
                            <label class="input">
                                  <!--i class="icon-append fa fa-envelope-o"></i>
                                  <!--input type="email" name="email" placeholder="Eail Id"-->
                                <b><i><?php  echo $result[0]->email; ?></i></b>
                               
                              </label>
                          </section>
                           <section>
                              <label class="label">Contact Address</label>
                             <label class="textarea">
                                  <!--i class="icon-append fa fa-comment"></i>
                                  <!--textarea rows="4" name="comment"  placeholder="Contact Address"></textarea-->
                                 <b><i><?php  echo $result[0]->address; ?></i></b>
                                
                              </label>
                         </section>
                

                  </fieldset>

          </div>     

                        <!-- end of Personal Form -->
                             
                        <!-- Health Form -->
                                 
     <div class="col-md-6 sky-form">
           <header>Health Details</header>

               <fieldset>

              <section>
                  <label class="label">Weight</label>
                  <label class="input">
                      <i class="icon-append fa fa-user"></i>
                      <!--input type="text" name="name"  placeholder="Weight"-->
                       {{form.weight}}
                  </label>
              </section>

              <section>
                  <label class="label">Height</label>
                  <label class="input">
                      <i class="icon-append fa fa-user"></i>
                      <!--input type="mobile" name="mobile"  placeholder="Height"-->
                       {{form.height}}
                  </label>

              </section>



              <section>
                  <label class="label">BMI
                 </label>
                <label class="input">
                      <i class="icon-append fa fa-user"></i>
                      <!--input type="email" name="email" placeholder="BMI"-->
                     {{form.bmi}}
                  </label>
              </section>
               <section>
                  <label class="label">Blood Pressure
                 </label>
                <label class="input">
                      <i class="icon-append fa fa-user"></i>
                      <!--input type="email" name="email" placeholder="Blood Pressure"-->
                     {{form.bloodpressure}}
                  </label>
              </section>
             <section>
                  <label class="label">Hemoglobin
                 </label>
                <label class="input">
                      <i class="icon-append fa fa-user"></i>
                      <!--input type="email" name="email" placeholder="Hemoglobin"-->
                     {{form.hemoglobin}}
                  </label>
              </section>
          <section>
                  <label class="label">Sugar
                 </label>
                <label class="input">
                      <i class="icon-append fa fa-user"></i>
                      <!--input type="email" name="email" placeholder="Sugar"-->
                     {{form.sugar}}
                  </label>
              </section>

      </fieldset>



     </div> 
                        <!-- end of Helath Form -->
                        
                  
               
                        
                </form> 
  <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Profile</h4>
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
              <input type="hidden" id="userid" value="<?php  echo $result[0]->ID; ?>" />
                <div class="row col-md-6"><!--div class="col-md-6"-->
                      <fieldset>
                        <section>
                             <label class="input">
                                
                                <?php  echo $result[0]->username; ?>
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                          
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input type="password" id="newuserpassword" placeholder="Password"  value="<?php  echo $result[0]->password; ?>" >
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>  
                       </fieldset> 
                </div>
                     <fieldset>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" id="email" placeholder="Email" value="<?php  echo $result[0]->email; ?>">
                                  <font color="red"><i><span id="emailErrmsg"></span></i></font>
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" id="mobile" placeholder="Mobile # {User ID }" value="<?php  echo $result[0]->mobile; ?>">
                            </label>
                            
                            <font color="red"><i><span id="errmsg"></span></i></font>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>  
                       </fieldset> 
                     <fieldset>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" id="name" placeholder="Name" value="<?php  echo $result[0]->name; ?>">
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                        <section>
                             <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <label class="textarea">
                                    <i class="icon-append fa fa-comment"></i>
                                    <textarea rows="3" placeholder="Contact Address" id="address" value="<?php  echo $result[0]->address; ?>"></textarea>
                                </label>
                            </label>
                                <!--input type="text" id="newuser" placeholder="Name" class="form-control  state-success" required-->                       </section>
                        
                       </fieldset> 
            </div>
        </form>     
            <div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                 <input type="submit" value="Update Profile"class="btn-u btn-u-primary" id="updateprofile"/>
                
            </div>
        </div>
    </div>
</div>
          
    
    
          </div>
        </div>
  </div>	    