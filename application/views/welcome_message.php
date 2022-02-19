<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>css/url.css">
      <script src="<?php echo base_url()?>js/jquery.min.js"></script>
      <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>js/url.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body style="font-family:Verdana;color:#aaaaaa;">
      <div style="background-color:#e5e5e5;padding:15px;text-align:center;">
         <h1>URL Shortener</h1>
      </div>
      <div style="overflow:auto">
         <div class="menu">
            <a onclick="changesection('1')">Generate Short Url</a>
            <a onclick="changesection('2')">Reterive Orginal Url</a>
            <a onclick="changesection('3')">Generated Short Urls</a>
            <a onclick="changesection('4')">Search by Project</a>
         </div>
         <div class="main">
            <div class="container" id="report_section"></div>
         </div>

		
      </div>  

	  <div id="msg" class="container" style="display: none;background-color:#831717;text-align:center;padding:10px;margin-top:7px;width: 50rem">
          <span id="response"></span>
      </div>
   </body>
</html>


