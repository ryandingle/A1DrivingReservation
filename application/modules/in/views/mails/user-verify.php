<div marginwidth="0" marginheight="0" style="margin:0;padding:0;background:#eeee;width:100%!important" bgcolor="#eee">
  <center>
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;margin:0;padding:0;height:100%!important;width:100%!important;background: #9ED7F5">
      <tbody><tr>
        <td align="center" valign="top">
          <table border="0" cellpadding="40" cellspacing="0" width="480">
            <tbody><tr>
              <td>
                <table border="0" cellpadding="0" cellspacing="0" width="480" style="background-color:#ffffff">
                  <tbody><tr>
                    <td>
                      <table border="0" cellpadding="0" cellspacing="0" width="480">
                        <tbody><tr>
                          <td align="center" valign="top">
							 <table border="0" cellpadding="24" cellspacing="0" height="50" style="border-bottom:1px solid #eee;padding:0 16px" width="480">
                              <tbody><tr>
                                <td valign="top" style="background-color:#ffffff">
                                  <a href="http://a1-driving.com" target="_blank" style="text-decoration:none;color: #494949"><h1>A1 Driving School</h></a>
                                </td>
                                <td style="text-align:right">
																</td>
                              </tr>
                            </tbody></table>
                            
                          </td>
                        </tr>
                        <tr>
                          <td align="center" valign="top">
                            
                            <table border="0" cellpadding="24" cellspacing="0" width="480" style="padding:0 16px 10px">
                              <tbody><tr>
                                <td valign="top" style="background-color:#ffffff">
                                  <font style="font-size:16px;color:#444;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.35">

                                  <p>Hi <?php echo $this->session->userdata('email');?>,</p>

                                    <p>Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                                    </p>

									<p>Before you process to reservation page :</p>

                                    <table>
                                      <tbody>
                                      	<tr><td>Complete you personal info &nbsp;</td></tr>
                                      	<tr><td>Update some minor info about your self: &nbsp;</td><td>Ex. age,loc etc.</td></tr>
                                       </tbody>
                                    </table>

                                    <p>Please verify your acount.</p>
                                    
                                    <?php 
										$this->db->where('id',$this->session->userdata('id'));
										$this->db->where('email',$this->session->userdata('email'));
										$get = $this->db->get('new_users');
										$row = $get->row();
									?>
                                    <p>CLICK <a href="<?php echo base_url();?>in/verify/<?php echo $row->verification;?>" target="_blank">VERIFY NOW</a> to reserved.</p>
                                    
                                    <p>Thank you for choosing A1 Driving School!</p>
									<p>Kindly regards,<br>The A1 Driving Team</p>
                                  </font>

                                </td>
                              </tr>
                            </tbody></table>
                            
                          </td>
                        </tr>

                      </tbody></table>
                    </td>
                  </tr>
                </tbody></table>
				<table border="0" cellpadding="5" cellspacing="0" width="520">
                  <tbody><tr>
                    <td align="center" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="510">
                        <tbody><tr>
                          <td valign="top">
                            
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tbody><tr>
                                <td valign="middle" width="520">

                                  <div style="color:#b3b3b3;font-family:Helvetica,Arial;font-size:11px;line-height:125%;text-align:center"><br>© a1driving.com <?php echo date("Y"); ?></div>
                                  <br>
                                </td>
                              </tr>
                            </tbody></table>
                            
                          </td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                </tbody></table>
                <br>
                
              </td>
            </tr>
          </tbody></table>
        </td>
      </tr>
    </tbody></table>
  </center><div class="yj6qo"></div><div class="adL">
</div></div>