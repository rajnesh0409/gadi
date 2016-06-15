<?php
$this->load->view('admin/templates/header.php');
?>


<div class="container-fluid-full">
		<div class="row-fluid">
				
		<?php $this->load->view('admin/templates/sidebar');?>
			
			
			<!-- start: Content -->
			<div id="content" class="span10">

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"><?php echo $heading;?> </a></li>
			</ul>

			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Booking No. - HPYBOOK<?php echo $booking_id;?></h2>
						
					</div>
					<div class="box-content" style="overflow: auto;">

<?php

//echo "<pre>";
//print_r($details);
							
?>
			
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="http://hoopy.in/assets/img/logo.png" style="width:100%; max-width:172px;">
                            </td>
                            
                            <td>
                               <b><?php echo $details['0']['booking']['booking_no'];?></b><br>
                              
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                               <b>Name :</b>  <?php echo $details['0']['customer']['user_name'];?><br>
                              <b>  Email : </b><?php echo $details['0']['customer']['email'];?><br>
							  <b> Phone : </b><?php echo $details['0']['customer']['mobile_no'];?>
                               
                            </td>
                            
                            <td>
                               
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Vehicle Details
                </td>
                
                <td>
                   
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Vehicle Number
                </td>
                
                <td>
                   <?php echo $details['0']['vehicle']['regno'];?>
                </td>
            </tr>
			
			  <tr class="item">
                <td>
                     Vehicle Brand
                </td>
                
                <td>
                    <?php echo $details['0']['vehicle']['brand_name'];?>
                </td>
            </tr>
			
			<tr class="item">
                <td>
                     Vehicle Model
                </td>
                
                <td>
                    <?php echo $details['0']['vehicle']['model_name'];?>
                </td>
            </tr>
			
			<tr class="item">
                <td>
                     Vehicle Fuel Type
                </td>
                
                <td>
                    <?php echo $details['0']['vehicle']['fuel'];?>
                </td>
            </tr>
			
			<tr class="item">
                <td>
                     Vehicle Transmission
                </td>
                
                <td>
                    <?php echo $details['0']['vehicle']['transmission'];?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Service Details
                </td>
                
                <td>
                    
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Service Category
                </td>
                
                <td>
                   <?php echo $details['0']['booking']['cat_name'];?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   Store Name
                </td>
                
                <td>
                    <?php echo $details['0']['booking']['store_name'];?>
                </td>
            </tr>
			
			<tr class="item">
                <td>
                   Services
                </td>
                
                <td>
                    <?php echo $details['0']['booking']['services'];?>
                </td>
            </tr>
            
           <tr class="item">
                <td>
                   Estimated Cost
                </td>
                
                <td>
                    <?php echo $details['0']['booking']['est_cost'];?>
                </td>
            </tr>
			
			  <tr class="heading">
                <td>
                    Address Details
                </td>
                
                <td>
                    
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Pickup Point
                </td>
                
                <td>
                   <?php echo $details['0']['booking']['pick_point'];?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   Drop Point
                </td>
                
                <td>
                    <?php echo $details['0']['booking']['drop_point'];?>
                </td>
            </tr>
			
			<tr class="item">
                <td>
                   Date
                </td>
                
                <td>
                    <?php echo $details['0']['booking']['at_date'];?>
                </td>
            </tr>
			
			<tr class="item last">
                <td>
                    Time Slot
                </td>
                
                <td>
                    <?php echo $details['0']['booking']['at_time'];?>
                </td>
            </tr>

        </table>
    </div>	

 </div>	
 </div>	
 </div>	
 </div>	 
 </div>	
 </div>		
	
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
	

<?php 
$this->load->view('admin/templates/footer.php');
?>
