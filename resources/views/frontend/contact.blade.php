@extends('frontend.layout.layoutuser')
@section('content')
	<!---->
	<div class="container">

			<!---->
		 <div class="main">
         <div class="reservation_top">
            	<div class=" contact_right">
            		<h3>Contact Form</h3>
            		<div class="contact-form">
							<form method="post" action="contact-post.html">
								<input type="text" class="textbox" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
								<input type="text" class="textbox" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
								<textarea value="Message" onfocus="this.value= '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
								<input type="submit" value="Send">
								<div class="clearfix"> </div>
							</form>
							<address class="address">
                    <p>9870 St Vincent Place, <br>Glasgow, DC 45 Fr 45.</p>
                    <dl>
                        <dt> </dt>
                        <dd>Freephone:<span> +1 800 254 2478</span></dd>
                        <dd>Telephone:<span> +1 800 547 5478</span></dd>
                        <dd>FAX: <span>+1 800 658 5784</span></dd>
                        <dd>E-mail:&nbsp; <a href="mailto@vintage.com">info(at)bigshop.com</a></dd>
                    </dl>
                </address>
						</div>
            	</div>
            </div>
           </div>
		   <div class="sub-cate">
            <div class=" top-nav rsidebar span_1_of_left">
                <h3 class="cate">Danh mục</h3>
     <ul class="menu">

    @foreach ($cate as $c)
    <li>
        <ul class="kid-menu">
            <li><a href="{{route('user.showPro')}}">{{ $c->name }}</a></li>
        </ul>
    </li>
    @endforeach
</ul>
</div>
            <!--initiate accordion-->
    <script type="text/javascript">
        $(function() {
            var menu_ul = $('.menu > li > ul'),
                   menu_a  = $('.menu > li > a');
            menu_ul.hide();
            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });

        });
    </script>
         </div>
           <div class="clearfix"> </div>
</div>
	<!---->
@endsection
