   
<div class="col-md-9">
    <div class="row margin-bottom-40">
         <div class="panel panel-blue">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tasks"></i>Create Hosiptal</h3>
             </div>
             <div class="panel-body"> 
              <form action="" id="sky-form" class="sky-form">
                 <div class="col-md-12">  
                    <fieldset>
                       <div class="row">
                            <label class="label col col-2">Hosiptal Name</label>
                            <section class="col col-4">
                                <label class="input">
                                     <input type="text" id="doctorname" placeholder="Name"/>
                                  </label>
                             <font color="red"><i><span id="doctorerrormsg"></span></i></font>    
                            </section>
                            <button type="button" class="btn-u"  name="button" id="getDoctors" > Check </button>
                   <button type="button" class="btn-u pull-right"  name="button" id="btnSubmitHosiptal">Save Data</button>
                         
                        </div>     
                         <section class="col col-4">
                           <font color="red"><i><span id="mainerrormsg"></span></i></font>   
                           </section>     
                     </fieldset> 
                    <!--fieldset>
                       <div class="row">
                         <button type="button" class="btn-u"  name="button" id="blockAppointment" > Block Slot </button>                             <button type="button" class="btn-u pull-right"  name="button" id="bthCheckAppointment" > Check </button>
                        </div>     
                        
                     </fieldset-->  
                    <fieldset>
                       <div class="row">
                           <section class="col col-4">
                           <div class="panel panel-sea margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-edit"></i>Hosiptal List</h3>
                            </div>
                            <table class="table table-striped" id="doctor_NonActive_data">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hosiptal Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                         </div>
                           </section>       
                    <section class="col col-8">
                        <div class="col-md-15">
                          <div class="panel panel-sea margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-edit"></i>Hosiptal Data</h3>
                                
                            </div>
                            
     <form  id="profile-form" action="." method="post">

          <div class="col-md-6 sky-form">
                <fieldset>

                          <section>
                              <label class="label">Name</label>
                              <label class="input">
                                  <i class="icon-append fa fa-user"></i>
                                   <input type="text" id="name"  placeholder="Name">
                              </label>
                          </section>

                          <section>
                              <label class="label">Mobile #</label>
                              <label class="input">
                                  <i class="icon-append fa fa-phone"></i>
                                  <input type="mobile" id="mobile"  placeholder="Mobile #">
                              </label>

                          </section>
                        
                         <section>
                              <label class="label">ALt Mobile #</label>
                              <label class="input">
                                  <i class="icon-append fa fa-phone"></i>
                                  <input type="mobile" id="altmobile"  placeholder="Alt Mobile #">
                              </label>

                          </section>


                          <section>
                              <label class="label">Email Id
                             </label>
                            <label class="input">
                                  <i class="icon-append fa fa-envelope-o"></i>
                                  <input type="email" id="email" placeholder="Eail Id">
                               
                              </label>
                          </section>
                           

                  </fieldset>

          </div>     

                        <!-- end of Personal Form -->
                             
                        <!-- Health Form -->
                                 
     <div class="col-md-6 sky-form">
               <fieldset>
                    <section>
                              <label class="label">Login ID</label>
                              <label class="input">
                                  <i class="icon-append fa fa-user"></i>
                                   <input type="text" id="loginid"  placeholder="Login Id">
                              </label>
                          </section>
              <section>
                  <label class="label">Password</label>
                  <label class="input">
                      <i class="icon-append fa fa-lock"></i>
                      <input type="password" id="password"  placeholder="Password">
                  </label>
              </section>

              <section>
                  <label class="label">Confrim Password</label>
                  <label class="input">
                      <i class="icon-append fa fa-lock"></i>
                      <input type="password" id="cpassword"  placeholder="Confirm Password">
                  </label>

              </section>

            <section>
              <label class="label">Contact Address</label>
             <label class="textarea">
                  <i class="icon-append fa fa-comment"></i>
                  <textarea rows="4" id="address"  placeholder="Contact Address"></textarea>

              </label>
         </section>


      </fieldset>
                


     </div> 

               
                        
                </form> 
                              
                              
                                
                              
                              
                        </div>
                                    
                     </div>    
                            </section>
                           
                        </div>     
                        
                     </fieldset> 
                   
                 </div>
                 </form>  
             </div>     
        </div>
     </div>
</div>    
    
    
</div>