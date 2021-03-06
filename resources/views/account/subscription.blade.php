@extends('layouts.master')
@section('title', $user->slug)
@section('content')
<div class="container">
    <section id="subscriptionsetting">
        <h3 style="color:#b35464;" >Subscription Setting</h3>
        <hr>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" autocomplete="off" method="post" action="{{ route('subscription.setting',auth()->user()->slug) }}" novalidate="novalidate">
                            @csrf
                            @if($user->subscription_price)
                            <div class="table-responsive">
                                <table class="table table-borderless subscriptionpayout" >
                                    <thead>
                                        <tr>
                                            <th> <b> Subscription Price </b></th>
                                            <th> <b>Bank Name</b> </th>
                                            <th> <b> Routing Number </b></th>
                                            <th><b>Account Number</b> </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>${{number_format($user->subscription_price, 2)}}</td>
                                            <td>{{$user->bank_accountname}}</td>
                                            <td>{{$user->bank_routingnumber}}</td>
                                            <td>{{$user->bank_accountnumber}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" name="subscription_price" value="{{ $user->subscription_price }}">
                            @else
                            <div class="form-group">
                                <label for="price" class="control-label"><b> Subscription Price </b><span class="form-required">&nbsp;*</span></label>
                                <div>
                                    <select name="subscription_price" id="subscription_price" class="form-control select2 select2-hidden-accessible">
                                        <option value="" data-select2-id="288">Please select...</option>
                                         <option value="5.00">$5.00</option>
                    
                                    </select>
                                        @if ($errors->has('subscription_price'))
                                            <small class="text-danger">{{ $errors->first('subscription_price') }}</small>
                                        @endif
                                </div>                                    
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="bankName" class="control-label"><b>   Bank Name</b><span class="form-required">&nbsp;*</span></label>
                                <div>
                                    <input type="text" data-rule-required="true" maxlength="50" class="form-control" id="bankName" name="bankName" value="{{old('bankName')}}">
                                    @if ($errors->has('bankName'))
                                        <small class="text-danger">{{ $errors->first('bankName') }}</small>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="beneficiarySwiftCode" class="control-label"><b> SWIFT Code(Routing Number for US Bank)</b><span class="form-required">&nbsp;*</span></label>
                                <div>
                                    <input type="text"  maxlength="50" data-rule-minlength="8" class="form-control" id="beneficiarySwiftCode" name="beneficiarySwiftCode" value="{{old('beneficiarySwiftCode')}}">
                                    @if ($errors->has('beneficiarySwiftCode'))
                                        <small class="text-danger">{{ $errors->first('beneficiarySwiftCode') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ibanAccountNo" class="control-label"> <b> IBAN / Account No</b><span class="form-required">&nbsp;*</span></label>
                                <div>
                                    <input type="text" data-rule-required="true" maxlength="50" data-rule-minlength="10" class="form-control" id="ibanAccountNo" name="ibanAccountNo" value="{{old('ibanAccountNo')}}">
                                    @if ($errors->has('ibanAccountNo'))
                                        <small class="text-danger">{{ $errors->first('ibanAccountNo') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    @if($user->subscription_price)
                                    <input type="submit" onclick="this.disabled=true;this.value='Updating...'; this.form.submit();return false;" value="BankInfo Update" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
                                    @else
                                    <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();return false;" value="Subscription Setting" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection