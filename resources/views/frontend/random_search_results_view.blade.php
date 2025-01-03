<style>
    .innerBosStar {
        font-size: 18px;
        margin-bottom: 16px;
    }
</style>

<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 customer-description">

        <div>
            <h6 id="name">{{ $customer->name }}</h6>
            <p>{{ $customer->email ?? '' }}</p>
            @if ($customer->customer_rating)
                <div class="innerBosStar">
                    <p>{{ $customer->ques_customer_rating }}</p>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                </div>
            @endif
            @if ($customer->customer_rating_2)
                <div class="innerBosStar">
                    <p>{{ $customer->ques_customer_rating_2 }}</p>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                </div>
            @endif
            @if ($customer->customer_rating_3)
                <div class="innerBosStar">
                    <p>{{ $customer->ques_customer_rating_3 }}</p>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                </div>
            @endif
            <p>{{ $customer->address }}</p>
            <p>{{ $customer->contact }}</p>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 customer-description">
        @if ($customer->working_with_customer)
            <h6>{{ $customer->ques_customer_work_1 }}</h6>
            <h6> {{ $customer->working_with_customer }}
            </h6>
        @endif
        @if ($customer->customer_work_2)
            <h6>{{ $customer->ques_customer_work_2 }}</h6>
            <h6> {{ $customer->customer_work_2 }}
            </h6>
        @endif
        @if ($customer->customer_work_3)
            <h6>{{ $customer->ques_customer_work_3 }}</h6>
            <h6> {{ $customer->customer_work_3 }}
            </h6>
        @endif
        @if ($customer->customer_pay_time)
            <h6>{{ $customer->ques_customer_pay_time_1 }}</h6>
            <h6> {{ $customer->customer_pay_time }}
            </h6>
        @endif
        @if ($customer->customer_pay_time_2)
            <h6>{{ $customer->ques_customer_pay_time_2 }}</h6>
            <h6> {{ $customer->customer_pay_time_2 }}
            </h6>
        @endif
        @if ($customer->customer_pay_time_3)
            <h6>{{ $customer->ques_customer_pay_time_3 }}</h6>
            <h6> {{ $customer->customer_pay_time_3 }}
            </h6>
        @endif
        @if ($customer->customer_recommendation)
            <h6>{{ $customer->ques_customer_recommendation_1 }}</h6>
            <h6> {{ $customer->customer_recommendation }}
            </h6>
        @endif
        @if ($customer->customer_recommendation_2)
            <h6>{{ $customer->ques_customer_recommendation_2 }}</h6>
            <h6> {{ $customer->customer_recommendation_2 }}
            </h6>
        @endif
        @if ($customer->customer_recommendation_3)
            <h6>{{ $customer->ques_customer_recommendation_3 }}</h6>
            <h6> {{ $customer->customer_recommendation_3 }}
            </h6>
        @endif
        @if ($customer->customer_description)
            <p>{{ $customer->ques_customer_description_1 }}</p>
            <p>{{ $customer->customer_description ?? '' }}</p>
        @endif
        @if ($customer->customer_description_2)
            <p>{{ $customer->ques_customer_description_2 }}</p>
            <p>{{ $customer->customer_description_2 ?? '' }}</p>
        @endif
        @if ($customer->customer_description_3)
            <p>{{ $customer->ques_customer_description_3 }}</p>
            <p>{{ $customer->customer_description_3 ?? '' }}</p>
        @endif
    </div>
</div>
