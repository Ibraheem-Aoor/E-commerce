<div>
    <div class="container" style="padding: 30px">
        <div class="row">
            <div id="review_form_wrapper">
                <div id="review_form">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div id="respond" class="comment-respond">
                        <form id="commentform" class="comment-form" novalidate="" wire:submit.prevent="addReview">
                            <p class="comment-notes">
                                <span id="email-notes">Your email address will not be published.</span> Required fields
                                are
                                marked <span class="required">*</span>
                            </p>
                            <div class="comment-form-rating">
                                <span>Your rating</span>
                                <p class="stars">
                                    <label for="rated-1"></label>
                                    <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                    <label for="rated-2"></label>
                                    <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                    <label for="rated-3"></label>
                                    <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                    <label for="rated-4"></label>
                                    <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                    <label for="rated-5"></label>
                                    <input type="radio" id="rated-5" name="rating" value="5" wire:model="rating">
                                    @error('rating')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <p class="comment-form-email">
                                <label for="email">Email <span class="required">*</span></label>
                                <input id="email" name="email" type="email" value="" wire:model="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="comment-form-comment">
                                <label for="comment">Your review <span class="required">*</span>
                                </label>
                                <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                            </p>
                        </form>

                    </div><!-- .comment-respond-->
                </div><!-- #review_form -->
            </div><!-- #review_form_wrapper -->
        </div>
    </div>
</div>
