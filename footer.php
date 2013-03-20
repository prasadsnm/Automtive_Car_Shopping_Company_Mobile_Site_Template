	<div data-role="footer" data-theme="b" id="footer">
	        <!--Social Icon--> 	
			<center>
				<h4>Stay Connected</h4>
				<div class="social">
                    <?if($facebook != "") {
                        ?>
                        <a href="<?=$facebook?>"><img src="images/facebook.png"/></a>
                    <? } ?>
                    <?if($twitter != "") {
                        ?>
                        <a href="<?=$twitter?>"><img src="images/twitter.png"/></a>
                    <? } ?>
                    <?if($youtube != "") {
                        ?>
                        <a href="<?=$youtube?>"><img src="images/youtube.png"/></a> 
                    <? } ?>
                    <?if($google != "") {
                        ?>
                        <a href="<?=$google?>"><img src="images/google.png"/></a>
                    <? } ?>
	            </div>
	        </center>


	        <!--Copyright-text, address, phone, email-->
	        <div id="custom_footer">
    		    <p>&copy; <?php echo date('Y');?> <?=$company_name?><br/>
    		    	<?=$address?> 
                </p>				
                <p>
    				<a class="button" data-theme="a" data-icon="phone" data-role="button" href="tel: <?=$phone?>">
                       <?=$phone?>
                   </a>
                </p>
                <p>Email:<br/> 
    				<span>
    					<a class="button" data-theme="a" data-icon="email" data-role="button" href="mailto: <?=$email?>"> <?=$email?> </a>
                    </span>
                </p>
    		<!---->
		</div>

	</div><!-- /footer -->
	
</div><!-- page ends -->

</body>
</html>