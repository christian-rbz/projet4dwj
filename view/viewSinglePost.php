<div class="container single-page blog-page">
        <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <header class="entry-header">
                        

                        <h2 class="entry-title"> <?=$article[0]->title()?></h2>

                        <div class="posted-date">
                            <?=$article[0]->date()?>
                        </div><!-- .posted-date -->

                
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p><?=$article[0]->content()?></p>

                      
                    </div><!-- .entry-content -->

                

                        <div class="col-12 col-md-6">
                            <figure class="blog-page-half-img">
                                <img src="images/blog-img-2.png" alt="">
                            </figure><!-- .blog-page-half-img -->
                        </div><!-- .col -->
                    </div><!-- .row -->

                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <div class="comments-count order-1 order-lg-3">
                            <a href="#">2 Comments</a>
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                </div><!-- .content-wrap -->

                <div class="content-area">
                    <div class="post-comments">
                        <h3 class="comments-title">Comments</h3>

                        <ol class="comment-list">
                            <li class="comment">
                                <div class="comment-body flex justify-content-between">
                                    <figure class="comment-author-avatar">
                                        <img src="images/user-1.jpg" alt="user">
                                    </figure><!-- .comment-author-avatar -->

                                    <div class="comment-wrap">
                                        <div class="comment-author flex flex-wrap align-items-center">
                                            <span class="fn">
                                                <a href="#">Maria Williams</a>
                                            </span><!-- .fn -->

                                            <span class="comment-meta">
                                                <a href="#">Jan 29, 2018</a>
                                            </span><!-- .comment-meta -->

                                            <div class="reply">
                                                <a href="#">Reply</a>
                                            </div><!-- .reply -->
                                        </div><!-- .comment-author -->

                                        <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. Donec accumsan justo nulla, sit amet varius urna laoreet vitae. Maecenas feugiat fringilla metus. </p>

                                    </div><!-- .comment-wrap -->
                                </div><!-- .comment-body -->
                            </li><!-- .comment -->

                            <li class="comment">
                                <div class="comment-body flex justify-content-between">
                                    <figure class="comment-author-avatar">
                                        <img src="images/user-2.jpg" alt="user">
                                    </figure><!-- .comment-author-avatar -->

                                    <div class="comment-wrap">
                                        <div class="comment-author flex flex-wrap align-items-center">
                                            <span class="fn">
                                                <a href="#">Lisa Moore</a>
                                            </span><!-- .fn -->

                                            <span class="comment-meta">
                                                <a href="#">Jan 29, 2018</a>
                                            </span><!-- .comment-meta -->

                                            <div class="reply">
                                                <a href="#">Reply</a>
                                            </div><!-- .reply -->
                                        </div><!-- .comment-author -->

                                        <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. Donec accumsan justo nulla, sit amet varius urna laoreet vitae. Maecenas feugiat fringilla metus. </p>

                                    </div><!-- .comment-wrap -->
                                </div><!-- .comment-body -->
                            </li><!-- .comment -->
                        </ol><!-- .comment-list -->
                    </div><!-- .post-comments -->

                    <div class="comments-form">
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a reply</h3>

                            <form class="comment-form">
                                <input type="text" placeholder="Name">
                                <input type="email" placeholder="Email">
                                <textarea rows="18" cols="6" placeholder="Messages"></textarea>
                                <input type="submit" value="Read More">
                            </form><!-- .comment-form -->
                        </div><!-- .comment-respond -->
                    </div><!-- .comments-form -->
                </div><!-- .content-area -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->

