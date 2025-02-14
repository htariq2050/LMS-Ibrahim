@extends('admin.layouts.app')
@section('title')
Instructor
@endsection
@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">




    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">

            <h1 class="m-0">Payout</h1>
        </div>
    </div>







    <div class="container-fluid page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Payout Account</strong></p>
                    <p class="text-muted mb-0">Where we will send you the money.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <div class="form-group d-flex flex-column">
                        <img alt="PayPal Logo" src="assets/images/logos/paypal.svg" width="140">
                        <div>
                            contact@frontted.com
                        </div>
                    </div>

                    <div class="form-group m-0">
                        <a href="#" class="btn btn-success">Change</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Account</strong></p>
                    <p class="text-muted mb-0">Set your account type &amp; details.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <div class="form-group">

                        <label for="fname">Account Type</label><br />
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-light active">
                                <input type="radio" name="options" id="option1" checked> Individual
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="options" id="option2"> Company
                            </label>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fname">First name</label>
                                <input id="fname" type="text" class="form-control" placeholder="First name" value="Adrian">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lname">Last name</label>
                                <input id="lname" type="text" class="form-control" placeholder="Last name" value="Demian">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc">Address</label>
                        <textarea id="desc" rows="4" class="form-control" placeholder="Enter invoice address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label><br />
                        <select id="country" class="custom-select w-auto">
                            <option value="usa">United States</option>
                            <option value="usa">Canada</option>
                        </select>
                        <small class="form-text text-muted">The country is not visible to other users.</small>
                    </div>
                    <div class="form-group m-0">
                        <a href="#" class="btn btn-outline-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>

    </div>




</div>
@endsection