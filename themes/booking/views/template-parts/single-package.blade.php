@extends('juzaweb::layouts.frontend')
@section('content')
<div class="row m-0 w-100">
                <div class="col-md-6">
                    <label>Branch</label>
                    <select name="branch" class="form-control">
                        <option selected disabled value="0">Please select a Branch</option>
                    </select>
                </div>
                    <div class="col-md-6">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
            </div>
            <div class="row m-0 w-100">
                <div class="col-12">
                    <span>Services</span>
                </div>
                <div class="col-12 p-3">
                    <div class="row m-0">
                                <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Service0</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Service1</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Service2</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Service3</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Service4</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 w-100">
                <div class="col-12">
                    <span>Time</span>
                </div>
                <div class="col-12 p-3">
                    <div class="row m-0">
                                <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Time0</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Time1</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Time2</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Time3</span>
                        </div>
                                    <div class="col d-flex align-items-center justify-content-center serviceBLk mx-2 mb-2 p-3">
                            <span>Time4</span>
                        </div>
                                </div>
                </div>
            </div>
            <form>
                <div class="row m-0">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" placeholder="Enter your mobile number">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary w-100">
                    <div class="row m-0">
                        <div class="col-10 text-center">
                        Submit
                        </div>
                        <div class="col-2 bg-white text-black d-flex align-items-center justify-content-center btnPrice">
                        5KD
                        </div>
                    </div>
                    </button>
                </div>
                </div>
            </form>	<!-- end of rest of page -->

@endsection
