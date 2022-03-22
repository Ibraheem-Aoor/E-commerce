<div>
    @section('page', 'orders / order details')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-3">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-info text-gradient">Cotnact Form Information</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Name: {{ $contact->name }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            E-mail: {{ $contact->email }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Phone: {{ $contact->phone ?? "NONE" }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Date: {{ $contact->created_at }}
                                        </p>
                                    </div>
                                    @if ($comment = $contact->comment)
                                        <div class="col-sm-12">
                                            <p class="text-dark ms-3">
                                                Comment: {{ $comment }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <footer class="blockquote-footer text-gradient text-info text-sm ms-3">
                                <cite
                                    title="Source Title">{{ $contact->user_id == null? 'This form has been submited by a guest': 'This form has been submited by a Registered User' }}</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
