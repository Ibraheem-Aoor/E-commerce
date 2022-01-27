<div>
    @if (session()->has('reviewAdded'))
        <div class="alert alert-success">
            {{ session()->get('reviewAdded') }}
        </div>
    @endif
    <div class="tab-content-item " id="review">
        <div class="wrap-review-form">
            <div id="comments">
                <h2 class="woocommerce-Reviews-title">{{ $numOfReviews }} Reviews for {{ $product->name }}</span>
                </h2>
                <ol class="commentlist">
                    @forelse($allRev as $r)
                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                            id="li-comment-20">
                            <div id="comment-20" class="comment_container">
                                <img alt="" src="{{ asset('assets/images/author-avata.jpg') }}" height="80"
                                    width="80">
                                <div class="comment-text">
                                    <div class="star-rating">
                                        <span class="width-50-percent">Rated <strong class="rating">5</strong>
                                            out of
                                            5</span>
                                    </div>
                                    <p class="meta">
                                        <strong class="woocommerce-review__author"></strong>
                                        <span class="woocommerce-review__dash">–</span>
                                        <time class="woocommerce-review__published-date"
                                            datetime="2008-02-14 20:00">{{ $r->created_at->diffForHumans() }}</time>
                                    </p>
                                    <div class="description">
                                        <p>
                                            {{ $r->content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        {{-- <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                            id="li-comment-20">
                            <h4>No Reviews Yet</h4>
                        </li> --}}
                    @endforelse
                </ol>
            </div><!-- #comments -->

            <div id="review_form_wrapper">
                <div id="review_form">
                    <div id="respond" class="comment-respond">

                        <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                            {{-- <p class="comment-notes">
                                <span id="email-notes">Your email address will not be
                                    published.</span> Required fields are marked <span class="required">*</span>
                            </p> --}}
                            <div class="comment-form-rating">
                                <span>Your rating</span>
                                <p class="stars">
                                    <label for="rated-1"></label>
                                    <input type="radio" id="rated-1" name="rating" value="1" wire:model="rate">
                                    <label for="rated-2"></label>
                                    <input type="radio" id="rated-2" name="rating" value="2" wire:model="rate">
                                    <label for="rated-3"></label>
                                    <input type="radio" id="rated-3" name="rating" value="3" wire:model="rate">
                                    <label for="rated-4"></label>
                                    <input type="radio" id="rated-4" name="rating" value="4" wire:model="rate">
                                    <label for="rated-5"></label>
                                    <input type="radio" id="rated-5" name="rating" value="5" wire:model="rate">
                                </p>
                            </div>
                            <p class="comment-form-comment">
                                <label for="comment">Your review <span class="required">*</span>
                                </label>
                                <textarea id="comment" name="comment" cols="45" rows="8"
                                    wire:model.lazy="reviewText"></textarea>
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Submit"
                                    wire:click.prevent="addReview">
                            </p>
                        </form>

                    </div><!-- .comment-respond-->
                </div><!-- #review_form -->
            </div><!-- #review_form_wrapper -->

        </div>
    </div>
</div>
