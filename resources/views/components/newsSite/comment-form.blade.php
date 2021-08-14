<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <form class="form-contact contact_form mb-80" action="{{route('add.comment')}}" method="post"
                  id="contactForm" novalidate="novalidate">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <textarea class="comment-form w-100" required name="message" id="message"
                                  cols="30" rows="9" onfocus="this.placeholder = ''"
                                  onblur="this.placeholder = 'Напишите комментарий'"
                                  placeholder="Напишите комментарий"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control " required name="name" id="name" type="text"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите ваш имя'"
                                   placeholder="Введите ваш имя">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" required name="email" id="email" type="email"
                                   onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Введите email'" placeholder="Email">
                        </div>
                    </div>
                    @if(request()->route()->uri === 'gallery/{id}')
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" required name="rating" id="rating" type="number"
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Поставьте оценку'"
                                       placeholder="Поставьте оценку">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>

        </div>
    </div>
</div>
