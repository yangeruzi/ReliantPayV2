<div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                            <li class="breadcrumb-item active">Add / Edit Product</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Business Registration</h4>
                                </div>
                            </div>
                        </div>
                      

                    <form wire:submit.prevent="registerdealer">

                        <div class="row">
                            <div class="col-lg-12">

                                @if($currentStep==1)
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Step 1/5: Business Information</h5>
                                            <div class="mb-3">
                                                <label for="business_name" class="form-label">Business Name</label>
                                                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter business name" value ="{{ old('business_name') }}" wire:model="business_name">
                                                <span class="text-danger"> @error('business_name') {{ $message}} @enderror </span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_address" class="form-label">Address</label>
                                                <textarea class="form-control" id="business_address" rows="4" name="business_address" placeholder="Enter business address" value ="{{ old('business_address') }}" wire:model="business_address"></textarea>
                                                <span class="text-danger"> @error('business_address') {{ $message}} @enderror </span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_website" class="form-label">Website</label>
                                                <input type="text" class="form-control" id="business_website" name="business_website" placeholder="Enter business website" value ="{{ old('business_website') }}" wire:model="business_website">
                                                <span class="text-danger"> @error('business_website') {{ $message}} @enderror </span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_email" class="form-label">E-Mail</label>
                                                <input type="text" class="form-control" id="business_email"  name="business_email" placeholder="Enter business email" value ="{{ old('business_email') }}" wire:model="business_email">
                                                <span class="text-danger"> @error('business_email') {{ $message}} @enderror </span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="business_phone"  name="business_phone" placeholder="Enter business phone" value ="{{ old('business_phone') }}" wire:model="business_phone">
                                                <span class="text-danger"> @error('business_phone') {{ $message}} @enderror </span>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Products & Services</label>
                                                {{-- <input type="text" id="selectize-tags" name="business_product_services" value ="{{ old('business_product_services') }}" wire:model="business_product_services"> --}}
                                                <div wire:ignore class="form-group">
                                                    <select id= "business_product_services" name="business_product_services" class="select2" multiple="multiple" data-placeholder="Select services" style="width: 100%;">
                                                        <option value="Airline Ticketing">Airline Ticketing</option>
                                                        <option value="Hotel Booking">Hotel Booking</option>
                                                        <option value="Internet Services">Internet Services</option>
                                                        <option value="HVAC Services">HVAC Services</option>
                                                        <option value="Others">Others</option>
                                                    </select>

                                                  
                                                </div>
                                                <span class="text-danger"> @error('business_product_services') {{ $message}} @enderror </span>
                                            </div>                                       
                                    </div>
                                </div> <!-- end card -->

                                @endif

                                @if($currentStep==2)

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Step 2/5: Statutory Compliances</h5>
                                            
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="business_PCI_DSS_compliance_status" name="business_PCI_DSS_compliance_status" wire:model="business_PCI_DSS_compliance_status">    
                                                    <label class="form-check-label" for="business_PCI_DSS_compliance_status">
                                                        PCI DSS Compliance
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="business_HTTPS_compliance_status" name="business_HTTPS_compliance_status" wire:model="business_HTTPS_compliance_status">    
                                                    <label class="form-check-label" for="business_HTTPS_compliance_status">
                                                        HTTPS Compliance
                                                </label>
                                            </div>
                                        </div>
                                        
                               
                                    </div>
                                </div> <!-- end card -->

                                @endif

                                @if($currentStep==3)
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Step 3/5: Bank Details</h5>

                                        <div class="mb-3">
                                            <label for="business_bank_account_name" class="form-label">Bank Account Name</label>
                                            <input type="text" class="form-control" id="business_bank_account_name" name="business_bank_account_name" placeholder="Enter Bank Account Name" value ="{{ old('business_bank_account_name') }}" wire:model="business_bank_account_name">
                                            <span class="text-danger"> @error('business_bank_account_name') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_bank_account_address" class="form-label">Bank Account Address</label>
                                            <input type="text" class="form-control" id="business_bank_account_address" name="business_bank_account_address" placeholder="Enter Bank Address" value ="{{ old('business_bank_account_address') }}" wire:model="business_bank_account_address">
                                            <span class="text-danger"> @error('business_bank_account_address') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_bank_name" class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" id="business_bank_name" name="business_bank_name" placeholder="Enter Bank Name" value ="{{ old('business_bank_name') }}" wire:model="business_bank_name">
                                            <span class="text-danger"> @error('business_bank_name') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_bank_address" class="form-label">Bank Address</label>
                                            <input type="text" class="form-control" id="business_bank_address" name="business_bank_address" placeholder="Enter Bank Address" value ="{{ old('business_bank_address') }}" wire:model="business_bank_address">
                                            <span class="text-danger"> @error('business_address') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_bank_IBAN" class="form-label">Bank IBAN</label>
                                            <input type="text" class="form-control" id="business_bank_IBAN" name="business_bank_IBAN" placeholder="Enter IBAN" value ="{{ old('business_bank_IBAN') }}" wire:model="business_bank_IBAN">
                                            <span class="text-danger"> @error('business_bank_IBAN') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_bank_IFSC" class="form-label">Bank IFSC</label>
                                            <input type="text" class="form-control" id="business_bank_IFSC" name="business_bank_IFSC" placeholder="Enter IFSC" value ="{{ old('business_bank_IFSC') }}"  wire:model="business_bank_IFSC">
                                            <span class="text-danger"> @error('business_bank_IFSC') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_bank_SWIFT_code" class="form-label">Bank SWIFT Code</label>
                                            <input type="text" class="form-control" id="business_bank_SWIFT_code" name="business_bank_SWIFT_code" placeholder="Enter SWIFT Code" value ="{{ old('business_bank_SWIFT_code') }}" wire:model="business_bank_SWIFT_code">
                                            <span class="text-danger"> @error('business_bank_SWIFT_code') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_bank_routing_code" class="form-label">Bank Routing Code</label>
                                            <input type="text" class="form-control" id="business_bank_routing_code" name="business_bank_routing_code" placeholder="Enter Routing Code" value ="{{ old('business_bank_routing_code') }}" wire:model="business_bank_routing_code">
                                            <span class="text-danger"> @error('business_bank_routing_code') {{ $message}} @enderror </span>
                                        </div>

                                    </div>
                                </div> <!-- end card -->

                                @endif

                                @if($currentStep==4)
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Step 4/5: Upload Documents</h5>

                                        <div class="mb-3">

                                            <div
                                                x-data="{isUploading: false, progress: 0}"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                                              
                                            >

                                            <label for="business_scan_signed_contract" class="form-label">Scanned Signed Contract</label>
                                            <input type="file" id="business_scan_signed_contract" name="business_scan_signed_contract" class="form-control" wire:model="business_scan_signed_contract">
                                            <span class="text-danger"> @error('business_scan_signed_contract') {{ $message}} @enderror </span>
                                        
                                            <div x-show="isUploading" class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" x-bind:style="`width: ${progress}%`" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            
                                            {{-- <div >
                                                <progress max="100" x-bind:value="progress"></progress>
                                            </div> --}}

                                        </div>
                                        
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_scan_EIN" class="form-label">Scanned EIN</label>
                                            <input type="file" id="business_scan_EIN" name="business_scan_EIN" class="form-control" wire:model="business_scan_EIN">
                                            <span class="text-danger"> @error('business_scan_EIN') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_scan_PAN" class="form-label">Scanned PAN</label>
                                            <input type="file" id="business_scan_PAN" name="business_scan_PAN" class="form-control" wire:model="business_scan_PAN">
                                            <span class="text-danger"> @error('business_scan_PAN') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_scan_registration_document" class="form-label">Scanned Business Registration</label>
                                            <input type="file" id="business_scan_registration_document" name="business_scan_registration_document" class="form-control" wire:model="business_scan_registration_document">
                                            <span class="text-danger"> @error('business_scan_registration_document') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_scan_signed_contract" class="form-label">Scanned Bank Statement (Last 06 Months)</label>
                                            <input type="file" id="business_scan_signed_contract" name="business_scan_signed_contract" class="form-control" wire:model="business_scan_signed_contract">
                                            <span class="text-danger"> @error('business_scan_signed_contract') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_scan_utility_bills" class="form-label">Scanned Utility Bills (Last 03 Months) </label>
                                            <input type="file" id="business_scan_utility_bills" name="business_scan_utility_bills" class="form-control" wire:model="business_scan_utility_bills">
                                            <span class="text-danger"> @error('business_scan_utility_bills') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_scan_business_tax_returns" class="form-label">Business Tax Returns (Last 03 Years)</label>
                                            <input type="file" id="business_scan_business_tax_returns" name="business_scan_business_tax_returns" class="form-control" wire:model="business_scan_business_tax_returns">
                                            <span class="text-danger"> @error('business_scan_business_tax_returns') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_premises_external_pictures" class="form-label">Business Premises Pictures (External)</label>
                                            <input type="file" id="business_premises_external_pictures" name="business_premises_external_pictures" class="form-control" wire:model="business_premises_external_pictures">
                                            <span class="text-danger"> @error('business_premises_external_pictures') {{ $message}} @enderror </span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="business_premises_internal_pictures" class="form-label">Business Premises Pictures (Office)</label>
                                            <input type="file" id="business_premises_internal_pictures" name="business_premises_internal_pictures" class="form-control" wire:model="business_premises_internal_pictures">
                                            <span class="text-danger"> @error('business_premises_internal_pictures') {{ $message}} @enderror </span>
                                        </div>


                                    </div>
                                </div> <!-- end card -->

                                @endif


                                @if($currentStep==5)

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Step 5/5: Terms & Conditions</h5>

                                            <div class="mb-3">

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" wire:model="terms">
                                                    
                                                    <label class="form-check-label" for="terms">
                                                        You must agree to our terms and conditions.
                                                    </label>
                                                </div>

                                            </div>
                                 
                                    </div>
                                </div> <!-- end card -->

                                @endif

                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">

                                
                                <div class="action-buttons d-flex justify-content-between  mb-3">

                                    @if($currentStep==1)
                                    
                                        <div>
                                            
                                        </div>
                                    
                                    @endif

                                    
                                    @if($currentStep==2 || $currentStep==3 || $currentStep==4 || $currentStep==5)
                                    
                                        <div>
                                            <button type="button" class="btn w-sm btn-secondary waves-effect waves-light" wire:click="decreaseStep()">Back</button>
                                        </div>
                                    
                                    @endif

                                    @if($currentStep==1 || $currentStep==2 || $currentStep==3 || $currentStep==4)
                                    
                                        <div>
                                            <button type="button" class="btn w-sm btn-success waves-effect waves-light" wire:click="increaseStep()">Next</button>
                                        </div>
                                    
                                    @endif

                                    @if($currentStep==5)
                                    
                                        <div>
                                            <button type="Submit" class="btn w-sm btn-success waves-effect waves-light">Submit</button>
                                        </div>
                                    
                                    @endif
                                    
                                    
                                </div>
                            
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                        
                    </div>

    
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2').on('select2:select', function (e) {
            //var item = e.params.data;
            alert(e.target.value);
            @this.set('business_product_services.services', e.target.value);
            
        });
    });

    document.addEventListener('livewire:load', function (event) {
          @this.on('refreshDropdown', function () {
              $('.select2').select2();
          });
     })

</script>
@endpush
        

