<template>
    <div class="container m-t-3">
        <div class="row">

            <!-- Image List -->
            <div class="col-sm-4">
                <div class="image-detail">
                    <img src="https://placehold.it/413x564" data-zoom-image="https://placehold.it/413x564" alt="">
                </div>
                <div class="products-slider-detail m-b-2">
                    <a href="#"><img src="https://placehold.it/76x104/acecfd/23dedd" data-zoom-image="https://placehold.it/413x564" alt="" class="img-thumbnail"></a>
                    <a href="#"><img src="https://placehold.it/76x104/acecfd/23dedd" data-zoom-image="https://placehold.it/413x564" alt="" class="img-thumbnail"></a>
                    <a href="#"><img src="https://placehold.it/76x104/acecfd/23dedd" data-zoom-image="https://placehold.it/413x564" alt="" class="img-thumbnail"></a>
                    <a href="#"><img src="https://placehold.it/76x104/acecfd/23dedd" data-zoom-image="https://placehold.it/413x564" alt="" class="img-thumbnail"></a>
                </div>
                <div class="title"><span>Share to</span></div>
                <div class="share-button m-b-3">
                    <button type="button" class="btn btn-primary"><i class="fa fa-facebook"></i></button>
                    <button type="button" class="btn btn-info"><i class="fa fa-twitter"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-google-plus"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-linkedin"></i></button>
                    <button type="button" class="btn btn-warning"><i class="fa fa-envelope"></i></button>
                </div>
            </div>
            <!-- End Image List -->

            <div class="col-sm-8">
                <div class="title-detail">{{ report.code }} - {{ report.display_name }}</div>
                <table class="table table-detail">
                    <tbody>
                    <tr>
                        <td>Price</td>
                        <td>
                            <div class="price">
                                <div>$13.50 <span class="label label-default arrowed">-10%</span></div>
                                <span class="price-old">$15.00</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Availability</td>
                        <td><span class="label label-success arrowed">Ready Stock</span></td>
                    </tr>

                    <tr>
                        <td>Size</td>
                        <td>
                            <select class="selectpicker" data-width="80px">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Checkbox</td>
                        <td>
                            <div class="checkbox"><label><input type="checkbox" id="checkbox1"><span> Checkbox 1</span></label></div>
                            <div class="checkbox"><label><input type="checkbox" id="checkbox2"><span> Checkbox 2</span></label></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Radio</td>
                        <td>
                            <div class="radio"><label><input type="radio" name="radio-product" checked="checked"><span>Radio 1</span></label></div>
                            <div class="radio"><label><input type="radio" name="radio-product"><span>Radio 2</span></label></div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-8">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Detail</a></li>
                    <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Reviews (2)</a></li>
                </ul>
                <!-- End Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content tab-content-detail">

                    <!-- Description Tab Content -->
                    <div role="tabpanel" class="tab-pane active" id="desc">
                        <div class="well">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, molestiae odit? Animi eligendi, optio culpa cupiditate, minus, eaque sint delectus non id accusamus suscipit illum quaerat quibusdam expedita dolore quos distinctio corporis quae. Error molestiae consequatur nostrum placeat architecto maiores commodi ipsam incidunt, adipisci tempora ratione soluta aliquam, velit voluptatum dolore reprehenderit quis aut. Obcaecati nam non quis praesentium deserunt qui consequatur illum quae nobis? Optio eos, sit corporis quam distinctio, ad aspernatur quisquam ut, corrupti accusamus saepe labore veritatis sed est rerum. Iste odit reiciendis mollitia culpa illum eligendi, soluta magnam voluptatum ut sequi vitae vel labore quae, ducimus.
                            </p>
                        </div>
                    </div>
                    <!-- End Description Tab Content -->

                    <!-- Detail Tab Content -->
                    <div role="tabpanel" class="tab-pane" id="detail">
                        <div class="well">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Lorem</td>
                                    <td>Ipsum</td>
                                </tr>
                                <tr>
                                    <td>Dolor</td>
                                    <td>Sit Amet</td>
                                </tr>
                                <tr>
                                    <td>Consectetur</td>
                                    <td>Adipisicing</td>
                                </tr>
                                <tr>
                                    <td>Excepteur</td>
                                    <td>Occaecat</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Detail Tab Content -->

                    <!-- Review Tab Content -->
                    <div role="tabpanel" class="tab-pane" id="review">
                        <div class="well">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-thumbnail" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                    </a>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Thor</strong></h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-thumbnail" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                    </a>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>Michael</strong></h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <hr/>
                            <h4 class="m-b-2">Add your review</h4>
                            <form role="form">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" id="Name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" id="Email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Rating</label><div class="clearfix"></div>
                                    <div class="input-rating"></div>
                                </div>
                                <div class="form-group">
                                    <label for="Review">Your Review</label>
                                    <textarea id="Review" class="form-control" rows="5" placeholder="Your Review"></textarea>
                                </div>
                                <button type="submit" class="btn btn-theme">Submit Review</button>
                            </form>
                        </div>
                    </div>
                    <!-- End Review Tab Content -->

                </div>
                <!-- End Tab panes -->

            </div>
        </div>
</template>


<style>

</style>


<script>
    export default{
        data(){
            return{
                report:[]
            }
        },

        components:{

        },

        mounted(){
            this.axios.get('/api/v1/report/' + this.$route.params.reportName).then((response) => {
                console.log(response);
                this.report = response.data.data
            });
        }
    }
</script>
