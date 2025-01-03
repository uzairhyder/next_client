@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Review Question</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('question.list') }}">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('question.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Question</label>
                                            <input class="form-control" type="text" value="{{ $review_question->title }}"
                                                placeholder="Enter Your Question" data-bs-original-title="" title=""
                                                name="title">
                                            <input class="form-control" type="hidden" value="{{ $review_question->id }}"
                                                placeholder="" data-bs-original-title="" title="" name="id">
                                        </div>
                                    </div>
                                </div>
                                      @if ($review_question->id == 6 || $review_question->id == 12 || $review_question->id == 13)
                                    <div class="rating activeRating3">
                                        <label class="star" for="rating_3_star5">
                                            <div class="fa fa-star"></div>
                                        </label>
                                        <label class="star" for="rating_3_star4">
                                            <div class="fa fa-star"></div>
                                        </label>
                                        <label class="star" for="rating_3_star3">
                                            <div class="fa fa-star"></div>
                                        </label>
                                        <label class="star" for="rating_3_star2">
                                            <div class="fa fa-star"></div>
                                        </label>
                                        <label class="star" for="rating_3_star1">
                                            <div class="fa fa-star"></div>
                                        </label>
                                    </div>
                                @endif
                                @if ($review_question->id == 21 || $review_question->id == 20 || $review_question->id == 10)
                                    <input class="form-control" type="text" placeholder="Description...." title=""
                                        readonly>
                                @endif  
                @if($review_question->id!=6 && $review_question->id!=12 && $review_question->id!=13  && $review_question->id!=21  && $review_question->id!=20  && $review_question->id!=13  && $review_question->id!=11  && $review_question->id!=10)
   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Answer</label>
                                            <input class="form-control" type="text"
                                                value="{{ $review_question->answer }}" placeholder="Enter Your Answer"
                                                data-bs-original-title="" title="" name="answer">

                                        </div>
                                    </div>
                                </div>
                             
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Second Answer</label>
                                            <input class="form-control" type="text"
                                                value="{{$review_question->answer2}}"
                                                placeholder="Enter Your Second Answer" data-bs-original-title=""
                                                title="" name="answer2">
                                        </div>
                                    </div>
                                </div>
                                
             @endif  
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Status</label>
                                        <div class="mb-3">
                                            <select name="status" id="cars">
                                                <option value="1"
                                                    {{$review_question->status == 1 ? 'selected' : ''}}>
                                                    Active</option>
                                                <option value="0"
                                                    {{ $review_question->status == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" id="" class="btn btn-success me-3">Add</button>
                                            <!--<a class="btn btn-danger" href="{{ route('question.list') }}"-->
                                            <!--    data-bs-original-title="" title="">Cancel</a>-->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- {{-- script start --}} -->
@endsection
