@extends('layouts.master')

@section('content')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">OUR SITE</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="card text-center" style="width: 100%;">
                <div class="card-body">
                    <h1 class="card-title">what's in</h1>
                    <h3 class="card-text">

                            Out of concern for your health in light of the Corona pandemic and your
                            democratic entitlement to the voting process .
                            This website provides a confidential and reliable electoral process.
                            You can review the available and current electoral programs and know
                            all the information related to them, then review the candidates
                            and their electoral information with full transparency,
                            and then choose the appropriate candidate and vote for him.
                            This site will allow you to do all of the above remotely
                            without the need to review the electoral centers.

                    </h3>
                    <a href="{{route('elctionprog.get')}}" class="btn btn-primary">
                        <h3>
                            Browse the electoral programs
                        </h3>
                    </a>
                </div>
            </div>

        </div>
    </section>


@stop
