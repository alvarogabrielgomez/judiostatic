<?php
                $post_offer_formated=$post_offer_datatime->format('d-m');
                    if (strtotime($post_offer_end_at) > 1) {
                    if (abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400) {
                        echo '<div class="clock-time"></div></li> <li style="color:red;">A oferta está prestes a terminar no dia '.$post_offer_formated.'</li>';
                    }else if(abs(time() - strtotime($post_offer_end_at)) >= 2 * 86400){
                        if(abs(time() - strtotime($post_offer_end_at)) >= 8 * 86400){
                            echo '<div class="clock-time clock-7"></div>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400){
                            echo '<div class="clock-time clock-70"></div>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 3 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 2 * 86400){
                            echo '<div class="clock-time clock-30"></div>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 4 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 3 * 86400){
                            echo '<div class="clock-time clock-25"></div>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 7 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 4 * 86400){
                            echo '<div class="clock-time clock-15"></div>';
                        }
                    }
                }
                    