<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="<?php print base_url()?>assets/js/gmap.js"></script> 
<h3>Create a Job circle</h3>
<hr>
<div class="grid fluid">
  <div class="span4" style="padding-right:20px;">

<form id="save_form">

<div class="input-control text">
    <input type="text" value="Bengaluru" placeholder="Enter city name" name="place_name" id="place_box" autocomplete="off"/>
</div>

<div class="input-control text">
    <input type="text" value="" placeholder="10 KM" name="radius"  readonly id="radius_id" />
</div>

<div class="input-control text">
    <input type="text" value="" placeholder="Job name" name="job_name"  id="jobname_id" />
</div>

<div class="input-control text">
    <input type="text" value="" placeholder="Remuneration" name="remuneration"  id="rem_id" />
</div>

<div class="input-control text" id="datepicker">
    <input type="text" name="job_date">
    <button class="btn-date" id="calendar_btn"></button>
</div>

<div class="grid">
  <div class="span6">
    <div class="input-control select">
    <label>From</label>
      <select id="fromTime" name="from_time"></select>
    </div>   
  </div>
  <div class="span6">
    <div class="input-control select">
    <label>To</label>
      <select id="toTime" name="to_time"></select>
    </div>      
  </div>
</div>



<div class="input-control textarea">
    <label>Short Description</label>
    <textarea name="short_desc" maxlength="200"></textarea>
</div>

<div class="input-control textarea">
    <label>Long Description</label>
    <textarea name="long_desc" maxlength="1000"></textarea>
</div>

<div class="grid">
  <div class="span6">
  
  <div class="input-control checkbox">
    <label>
        <input type="checkbox" name="id_proof" />
        <span class="check"></span>
        ID Proof Required
    </label>
</div>

  </div>
  <div class="span6">
    <div class="input-control checkbox">
        <label>
            <input type="checkbox" name="english" />
            <span class="check"></span>
            Should speak Engilsh
        </label>
    </div>     
  </div>
</div>

<div class="input-control checkbox">
        <label>
            <input type="checkbox" name="job_status" />
            <span class="check"></span>
            Job status (Active/Draft)
        </label>
    </div>     

<br>
<input type="hidden" name="latlong" id="latlong_id">
<button id="save_btn" class="btn btn-primary">Save Job</button>




</form>
  </div>
  <div class="span8" id="map-canvas"></div>
</div>
