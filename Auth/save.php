<?php
                            $to = "kwendobrian96@gmail.com";
                            $subject = "New user signed up!";
                            $message = '<html><body><center>';          
                            $message .= '<table rules = "all" border="0" cellpadding="10">';
                            $message .= "<tr style='background: #eee;'><td colspan='2'><strong>Dear Admin!</strong></td></tr>";
                            $message .= "<tr><td colspan='2'><strong>New user</strong> has Signed up in Clinical Referral System! Kindly confirm him or her. </td></tr>";                
                            $message .= "<tr><td>Click <a href='www.apondiform.com/Clinical/Auth'>here</a></td><td>&nbsp;</td></tr>";
                             $message .= "</table>";             
                            $message .= "</center></body></html>";   
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                            mail($to, $subject, $message, $headers) or die("Error!");




                            