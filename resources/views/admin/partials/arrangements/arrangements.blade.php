
<div class="page page-form-wizard clearfix ng-scope">

    <ol class="breadcrumb breadcrumb-small">
        <li>Your Hotel</li>
        <li class="active"><a href="#/hotels"> Add New Arrangements</a></li>
    </ol>

    <div class="page-wrap panel panel-body">

		<form  name="arrangementsForm" class="form-horizontal col-lg-10" ng-submit="arrangementsForm.$valid && addNewArrangement()">
			<div class="form-block">
				
				<h3 class="text-uppercase text-bold mb30">Add New Arrangements</h3>
				
			    <div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small">Name</label>
			        <div class="col-lg-4">
			            <input type="text" name="name" class="form-control" placeholder="Arrangement Name" required>
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small">Transcription</label>
			        <div class="col-lg-10">
			            <div class="text-angular-editor" text-angular></div>
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small">Special</label>
			        <div class="col-lg-4">
						<div class="ui-toggle ui-toggle-lg ui-toggle-info">
							<label class="ui-toggle-inline">
								<input type="checkbox" name="arrangementSpecial"> 
								<span></span>
							</label>
						</div>
						<!-- #end ui-toggle -->
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small">Maximum number</label>
			        <div class="col-lg-4">
			        	<div class="select-box">
			        		<select name="arrangementMax" class="form-control">
			        			<option value="">Select</option>
			        			<option value="1">1</option>
			        			<option value="2">2</option>
			        			<option value="3">3</option>
			        			<option value="4">4</option>
			        			<option value="5">5</option>
			        		</select>	
			        	</div><!-- /select-box -->
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small">Arrangement for several days</label>
			        <div class="col-lg-10">
						<div class="ui-toggle ui-toggle-lg ui-toggle-info">
							<label class="ui-toggle-inline">
								<input type="checkbox" ng-model="arrangementsForm.days" name="arrangementDays"> 
								<span></span>
							</label>
						</div><!-- #end ui-toggle -->
						<div ng-show="arrangementsForm.days">
							this arrangement consists of
							<div class="select-box inline">
				        		<select name="arrangementMax" class="form-control">
				        			<option value="1">1</option>
				        			<option value="2">2</option>
				        			<option value="3">3</option>
				        			<option value="4">4</option>
				        			<option value="5">5</option>
				        		</select>
							</div><!-- /select-box -->
							nights
						</div>
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small">Rebate System</label>
			        <div class="col-lg-10">
						<div class="ui-toggle ui-toggle-lg ui-toggle-info">
							<label class="ui-toggle-inline">
								<input type="checkbox" ng-model="arrangementsForm.rebate" name="rebate"> 
								<span></span>
							</label>
						</div><!-- #end ui-toggle -->
						<div ng-show="arrangementsForm.rebate">
							3=2, Book 3 nights = Pay for 2 nights (multiple 3 nights)
						</div>
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small">Type</label>
			        <div class="col-lg-4">
		        		<select name="arrangementType" class="form-control" multiple>
							<option value="" selected="selected"></option>
							<option value="voorjaar">spring</option>
							<option value="bosrijk">bosrijk</option>
							<option value="culinaire">culinary</option>
							<option value="feestelijk">festive</option>
							<option value="gezondheid">health</option>
							<option value="kindvriendelijk">child-friendly</option>
							<option value="natuur_en_sport">nature and sports</option>
							<option value="romantisch">romantic</option>
							<option value="stedelijk_en_cultuur">city and culture</option>
							<option value="verwen">relax</option>
							<option value="weekend">weekend</option>
							<option value="zakelijk">business..</option>
							<option value="zomer">summer</option>
							<option value="Park_Sleep_Fly">Park Sleep Fly</option>
							<option value="Aan_het_water">Aan het water</option>
		        		</select>	
			        </div>
			        <div class="col-lg-6">
			        	<p class="help-block">You can select max. 3 types, press the CTRL-key and select the desired type</p>
			        	<p class="help-block">If you do not find your type arrangement, please inform us <a href="#">freebookings.nl</a></p>
			        </div>
			    </div>

			</div><!-- /form-block -->
			<div class="form-block">
				<div class="alert alert-info"><p>Please enter the number of nights, when the arrangement consists of several nights. The price below is the total price.</p></div>
				<div class="alert alert-info"><p>The price is per night, if you do not wish an arrangement for several days (please enter no price per person). A surcharge is always per room, per night!</p></div>
			</div><!-- /form-block -->
			<div class="form-block">
				<div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small pt0">Prijs</label>
			        <div class="col-lg-6">
						<div class="ui-radio ui-radio-info">
						    <label class="ui-radio">
						        <input type="radio" value="more" name="prijs">
						        <span>Ja, arrangement (meer)prijs per dag:</span>
						    </label>
						    <div class="mt15">
						    	<div class="input-group mb0">
							    	<span class="input-group-addon fa fa-euro"></span>
							    	<input type="text" class="form-control">						    		
						    	</div>
						    </div>
						</div>
						<div class="ui-radio ui-radio-info">
						    <label class="ui-radio">
						        <input type="radio" value="nee" name="prijs" class="ng-pristine ng-untouched ng-valid">
						        <span>Nee, Prices from:</span>
						    </label>
						    <div class="mt15">
						    	<div class="input-group mb0">
							    	<span class="input-group-addon fa fa-euro"></span>
							    	<input type="text" class="form-control">
							    	<span class="input-group-addon">(*1)</span>
						    	</div>
						    </div>							    
						</div>				        	
					</div>
					<div class="col-lg-4">
						<p class="text-danger">
							Om prijzen aan te passen die u bij de opmaak van arrangement heeft aangemaakt, die u naar de module: '' prijs en beschikbaarheid '' of '' Prijzen beheren '' te gaan! Alleen daar worden prijs aanpassingen doorgevoerd in het systeem.
						</p>
					</div>
				</div>
			</div><!-- form-block -->
			<div class="form-block">
				<div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small pt0">Rooms</label>
			        <div class="col-lg-10">
			        	<div class="row">
			        		<div class="col-lg-3">
								<div class="ui-checkbox ui-checkbox-info">
								    <label>
								        <input type="checkbox" name="twinKamer">
								        <span>twin kamer</span>
								    </label>
								</div><!-- /ui-checkbox -->
			        		</div>
			        		<div class="col-lg-4">
								<div class="ui-radio ui-radio-info">
								    <label class="ui-radio-inline">
								        <input type="radio" value="standarRoom" name="standarRoom">
								        <span>Make it Standard Rooom</span>
								    </label>
								</div>
			        		</div>
			        		<div class="col-lg-5">
			        			<div class="row">
			        				<div class="col-lg-6">
			        					<p>surcharge per night</p>
			        				</div>
			        				<div class="col-lg-6">
										<div class="input-group mb0">
											<span class="input-group-addon fa fa-euro"></span>
											<input type="text" class="form-control">						    		
										</div>
			        				</div>
			        			</div>
			        		</div>
			        	</div><!-- /row -->
			        	<div class="row">
			        		<div class="col-lg-3">
								<div class="ui-checkbox ui-checkbox-info">
								    <label>
								        <input type="checkbox" name="twinKamer">
								        <span>twin kamer</span>
								    </label>
								</div><!-- /ui-checkbox -->
			        		</div>
			        		<div class="col-lg-4">
								<div class="ui-radio ui-radio-info">
								    <label class="ui-radio-inline">
								        <input type="radio" value="standarRoom" name="standarRoom">
								        <span>Make it Standard Rooom</span>
								    </label>
								</div>
			        		</div>
			        		<div class="col-lg-5">
			        			<div class="row">
			        				<div class="col-lg-6">
			        					<p>surcharge per night</p>
			        				</div>
			        				<div class="col-lg-6">
										<div class="input-group mb0">
											<span class="input-group-addon fa fa-euro"></span>
											<input type="text" class="form-control">						    		
										</div>
			        				</div>
			        			</div>
			        		</div>
			        	</div><!-- /row -->				        	
					</div>
				</div><!-- /form-group -->
				<div class="form-group">
			        <label class="col-lg-2 control-label text-bold text-uppercase small pt0">Availability</label>
			        <div class="col-lg-10">
						<div class="ui-checkbox ui-checkbox-info">
						    <label>
						        <input type="checkbox" name="roomAvailability" checked="checked" disabled="disable">
						        <span>Linked to the rooms</span>
						    </label>
						</div><!-- /ui-checkbox -->
					</div>
				</div><!-- /form-group -->					
			</div><!-- /form-block -->
			<div class="form-block">
				<div class="form-group" ng-controller="DatepickerCtrl">
				    <div class="row">
					    <label class="col-lg-2 control-label text-bold text-uppercase small">Valid</label>
					    <div class="col-lg-4">
					        <div class="input-group">
					            <input type="text" class="form-control" ng-model="valid.from" name="from" datepicker-popup is-open="fromOpened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" show-button-bar="false" placeholder="From">
					            <span class="input-group-btn">
					                <button type="button" class="btn btn-sm btn-info fa fa-calendar" ng-click="fromOpen($event)"></button>
					            </span>
					        </div>
					    </div>
					    <div class="col-lg-4">
					        <div class="input-group">
					            <input type="text" class="form-control" ng-model="valid.to" name="to" datepicker-popup is-open="toOpened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" show-button-bar="false" placeholder="Until">
					            <span class="input-group-btn">
					                <button type="button" class="btn btn-sm btn-info fa fa-calendar" ng-click="toOpen($event)"></button>
					            </span>
					        </div>
					    </div>
				    </div><!-- /row -->
				</div><!-- /form-group -->
				<div class="form-group">
				    <div class="row">
					    <label class="col-lg-2 control-label text-bold text-uppercase small pt0">Valid On</label>
					    <div class="col-lg-10">
					    	<div class="row">
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="monday">
									        <span>Monday</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="tuesday">
									        <span>Tuesday</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="wednesday">
									        <span>Wednesday</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="thursday">
									        <span>Thursday</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>

					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="friday">
									        <span>Friday</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="saturday">
									        <span>Saturday</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="sunday">
									        <span>Sunday</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    	</div>
					    </div>
					 </div>
				</div><!-- /form-group -->
				<div class="form-group">
				    <div class="row">
					    <label class="col-lg-2 control-label text-bold text-uppercase small pt0">Link To</label>
					    <div class="col-lg-10">
					    	<div class="row">
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="dutch">
									        <span><img  src='{{ url('img/flags/nl.png') }}'> Dutch</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="german">
									        <span><img  src='{{ url('img/flags/de.png') }}'> German</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="english">
									        <span><img  src='{{ url('img/flags/en.png') }}'> English</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>
					    		<div class="col-lg-3">
									<div class="ui-checkbox ui-checkbox-info">
									    <label>
									        <input type="checkbox" name="french">
									        <span><img  src='{{ url('img/flags/fr.png') }}'> French</span>
									    </label>
									</div><!-- /ui-checkbox -->
					    		</div>

							</div>
						</div>
					</div><!-- /row -->
				</div><!-- /form-group -->
				<div class="form-group">
				    <div class="row">
					    <label class="col-lg-2 control-label text-bold text-uppercase small">On Requests</label>
						<div class="col-lg-10">
							<div class="ui-toggle ui-toggle-lg ui-toggle-info">
								<label class="ui-toggle-inline">
									<input type="checkbox" name="request"> 
									<span></span>
								</label>
							</div>
						</div>
					</div>
				</div><!-- /form-group -->
			</div><!-- /form-block -->
			<div class="form-block">
			    <div class="form-group">
				    <div class="row">
					    <label class="col-lg-2 control-label text-bold text-uppercase small">Upload Images</label>
					    <div class="col-lg-4">
							<div class="fileUpload btn btn-info">
							    <span>Image 1</span>
							    <input type="file" class="upload" />
							</div>
							<div class="fileUpload btn btn-info">
							    <span>Image 2</span>
							    <input type="file" class="upload" />
							</div>
					    </div>
					    <div class="col-lg-6">
					    	<div class="alert alert-info">
						    	<p><a href="#">Information for uploading new pictures</a></p>
					    	</div><!-- /alert -->
					    </div>
					 </div>
			    </div><!-- /form-group -->
			</div><!-- /form-block -->
			<div class="form-block">
				<button type="submit" class="btn btn-primary">Save</button>
				<button type="reset" class="btn btn-default">Cancel</button>
			</div><!-- /form-block -->
		</form><!-- /arrangementsForm -->

    </div>

</div>
