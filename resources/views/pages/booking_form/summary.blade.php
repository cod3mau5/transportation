<div class="widget card text-center border border-success">
    <div class="card-header bg-transparent border-success">
        <h1 class="widget-title my-0 text-success m-font m-color">
            <b>@{{ text.book_now.summary.title }}</b>
        </h1>
    </div>
    <hr class="line">
    <div class="summary-block">
        <div class="summary-content">
            <div class="summary-head">
                <p class="summary-title">@{{ text.book_now.summary.start_location }}</p>
            </div>
            <div class="summary-price">
                <p class="summary-text sm_start"></p>
            </div>
        </div>
    </div>
    <hr class="line">
    <div class="summary-block">
        <div class="summary-content">
            <div class="summary-head">
                <p class="summary-title">@{{ text.book_now.summary.end_location }}</p>
            </div>
            <div class="summary-price">
                <p class="summary-text sm_end"></p>
            </div>
        </div>
    </div>
    <hr class="line">
    <div class="summary-block">
        <div class="summary-content">

            <div class="summary-price">
                <div class="summary-head"> <p class="summary-title">@{{ text.book_now.summary.trip_type }}</p></div>

                <span class="summary-small-text sm_trip"></span>
            </div>
            <hr class="line">
            <div class="summary-head">
                <div class="summary-head">
                    <p class="summary-title">Unit</p>
                </div>
                <p class="summary-text img">
                    <img src="" class="w-100" alt="">
                    <span class="sm_unit"></span>
                </p>
            </div>

        </div>
    </div>
    <hr class="line">
    <div class="summary-block">
        <div class="summary-content">
        <div class="summary-head">
            <p class="summary-title">
                @{{ text.book_now.summary.total }}
            </p></div>
            <div class="summary-price">
                <p class="summary-text sm_price"></p>
            </div>
        </div>
    </div>
</div>
