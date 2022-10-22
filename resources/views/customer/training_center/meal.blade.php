@extends('customer.training_center.layouts.app')

@section('content')


@hasanyrole('Diamond')
    <a href="{{url()->previous()}}" class="back-btn margin-top">
        <iconify-icon icon="bi:arrow-left" class="back-btn-icon"></iconify-icon>
    </a>

    <div class="card-chart">
        <div class="card-donut card-goalchart" data-size="300" data-thickness="18"></div>
        <div class="card-center">
        <span class="card-value">0</span>
        <div class="card-label">of 1775cal</div>
        </div>

    </div>

    <div class="customer-diamond-food-track-header">
        <h1>Log Everything you eat today</h1>
        <span>Be honest and track everything. We’ll optimize your program and based on the data</span>
    </div>

    <div class="customer-food-tracker-parent-container">
        <div class="customer-food-tracker-container">
            <div class="customer-food-tracker-header">
                <h1>Breakfast</h1>
                <p>Total : <span>600cal</span></p>
            </div>
            <div class="customer-food-tracker-checkboxes-container">


                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>

            </div>
        </div>
        <div class="customer-food-tracker-container">
            <div class="customer-food-tracker-header">
                <h1>Lunch</h1>
                <p>Total : <span>600cal</span></p>
            </div>
            <div class="customer-food-tracker-checkboxes-container">
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
            </div>
        </div>
        <div class="customer-food-tracker-container">
            <div class="customer-food-tracker-header">
                <h1>Dinner</h1>
                <p>Total : <span>600cal</span></p>
            </div>
            <div class="customer-food-tracker-checkboxes-container">
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
            </div>
        </div>
        <div class="customer-food-tracker-container">
            <div class="customer-food-tracker-header">
                <h1>Snack</h1>
                <p>Total : <span>600cal</span></p>
            </div>
            <div class="customer-food-tracker-checkboxes-container">
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
                <label class="customer-food-tracker-checkbox">
                    <input type="checkbox">
                    <div class="customer-food-tracker-checkbox-label">
                        <p>Mont Hin Khar</p>
                        <span>200cal</span>
                    </div>
                </label>
            </div>
        </div>
    </div>
@endhasanyrole

@hasanyrole('Platinum')

<a href="{{ url()->previous() }}" class="back-btn margin-top">
    <iconify-icon icon="bi:arrow-left" class="back-btn-icon"></iconify-icon>
</a>

<p class="customer-plat-total-cal">Total : <span>1755 cal</span></p>

<h1 class="customer-plat-food-track-header">These are foods you should eat</h1>

<div class="customer-food-tracker-parent-container">

    <div class="customer-food-tracker-container">
        <div class="customer-food-tracker-header">
            <h1>Breakfast</h1>
            <p>Total : <span>600cal</span></p>
        </div>
        <div class="customer-food-tracker-checkboxes-container">


            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>

        </div>
    </div>
    <div class="customer-food-tracker-container">
        <div class="customer-food-tracker-header">
            <h1>Breakfast</h1>
            <p>Total : <span>600cal</span></p>
        </div>
        <div class="customer-food-tracker-checkboxes-container">
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
        </div>
    </div>
    <div class="customer-food-tracker-container">
        <div class="customer-food-tracker-header">
            <h1>Breakfast</h1>
            <p>Total : <span>600cal</span></p>
        </div>
        <div class="customer-food-tracker-checkboxes-container">
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
        </div>
    </div>
    <div class="customer-food-tracker-container">
        <div class="customer-food-tracker-header">
            <h1>Breakfast</h1>
            <p>Total : <span>600cal</span></p>
        </div>
        <div class="customer-food-tracker-checkboxes-container">
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
            <label class="customer-food-tracker-checkbox customer-plat-food-tracker">
                <!-- <input type="checkbox"> -->
                <div class="customer-food-tracker-checkbox-label">
                    <p>Mont Hin Khar</p>
                    <span>200cal</span>
                </div>
            </label>
        </div>
    </div>
</div>

@endhasanyrole

@endsection
