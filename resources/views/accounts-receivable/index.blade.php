@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Accounts Receivable</h1>
            <ul>
                <li><a href="">Accounting</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="card-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <fieldset class="form-group">
                    <legend class="col-form-label pt-0">Select Year *</legend>
                    <v-select
                    v-model="selectedYear"
                    :options="yearOptions"
                    :clearable="false"
                    placeholder="Select year"
                    label="label"
                    ></v-select>
                </fieldset>
            </div>
            <div class="col-sm-12 col-md-3">
                <fieldset class="form-group">
                <legend class="col-form-label pt-0">Select Month *</legend>
                <v-select
                    v-model="selectedMonth"
                    :options="monthOptions"
                    :clearable="false"
                    placeholder="Select month"
                    label="label"
                />
                </fieldset>
            </div>
        </div>
        <div class="card-body">
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                        Pending
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                        Approved
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                        Completed
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                        Disapproved
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                        Archived
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection