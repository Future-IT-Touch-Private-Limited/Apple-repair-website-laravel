
   @php
                                $settings=DB::table('settings')->get();
                                 @endphp
                                 
@section('title','About us')

@section('meta_desc')
{{ $settings[0]->meta_description }}'
@stop

@section('meta_keywords')
{{ $settings[0]->meta_keywords }}'
@stop

@include('header')
    <div class="au-hero-section wf-section">
      <div class="universal-section-container">
        <h1 class="au-heading">History of Appy Planet</h1>
      </div>
    </div>
    <div class="white-section wf-section">
      <div class="universal-section-container">
        <div class="left-aligned-container">
         
                               @foreach($settings as $setting)
                                @php
                               echo $code = $setting->homepage_about;
                                @endphp
                                @endforeach
      </div>
    </div>
  </div>
  <div class="grey-section wf-section">
    <div class="universal-section-container">
      <div class="au-grid">
        <div id="w-node-_8a17cac6-40c3-2db3-f663-efdb5c700da4-317a1ba8" class="idea-image"></div>
        <div id="w-node-f5b57c7a-da16-c983-57b0-27ae8576fb11-317a1ba8" class="left-aligned-container">
          <h2>Repair &gt; Refurbish &gt; Reuse</h2>
          <p class="paragraph">
            Undoubtedly, Apple items are expensive. Pre-owned reconditioned
            products, particularly MacBooks & iPhones, are in high demand. The
            same performance and quality can be availed for almost half the
            price. The most of Apple devices qualify for 90 days of free
            technical support. After the first 90 days, online technical help
            for Apple products is offered. <br />
            Appy Planet Services is an accessible destination to purchase
            Apple devices and accessories. We have launched our pre-owned
            sales division. After selling over two thousand gadgets in the
            first year alone, we understood that buyers' main worry in this
            case was trust: what if the MacBook turns out to be a terrible
            lemon? You can relax knowing that Appy's used devices go through a
            thorough QC procedure and include a warranty that lasts at least
            three months. what are you waiting for? Call us or book online at
            www.appyplanetservices.com and get your desired service and
            device.
          </p>
          <a href="macbook-service-center" class="text-link-wrapper w-inline-block">
            <div class="text-link-text">Contact Us</div>
            <div class="text-link-icon">
              <em class="italic-text-3"></em>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="white-section wf-section">
    <div class="universal-section-container">
      <div class="au-grid">
        <div id="w-node-_066d91da-d990-f01a-e47c-9830fab988fd-317a1ba8" class="right-aligned-container">
          <h2>From Retail to B2B</h2>
          <p class="paragraph">
            We expanded our footprints into the B2B sector quite seamlessly
            from the retail sector. Committed clients recognised the value we
            could contribute to their businesses. They began introducing us to
            their procurement managers, asset managers, and IT administrators.
            We have now onboarded more than 100 firms, both startups and
            established corporations, since around late 2006. The engagement
            models range from AMCs to on-demand repair services. Our menu of
            services has expanded to include rentals as well as sales and
            services in the past.
          </p>
          <a href="for-business" class="text-link-wrapper w-inline-block">
            <div class="text-link-text">
              More details &quot;Appy Planet for Business&quot;
            </div>
            <div class="text-link-icon">
              <em class="italic-text-3"></em>
            </div>
          </a>
        </div>
        <div id="w-node-_066d91da-d990-f01a-e47c-9830fab988fc-317a1ba8" class="learning-image"></div>
      </div>
    </div>
  </div>
  <div class="grey-section wf-section">
    <div class="universal-section-container">
      <div class="au-grid">
        <div id="w-node-_31d685db-6fcf-377a-6e65-c9595fe54d9d-317a1ba8" class="ecofriendly-image"></div>
        <div id="w-node-_31d685db-6fcf-377a-6e65-c9595fe54d9e-317a1ba8" class="left-aligned-container">
          <h2>Helping the environment along the way</h2>
          <p class="paragraph">
            This was more of an after-the-fact insight. Without consciously
            choosing to do so, Appy has been conducting business in an
            environmentally friendly manner since the beginning. It goes
            without saying that our area of business generates a lot of
            e-waste. To ensure the safe disposal of the dangerous e-waste, we
            have partnered with and used the services of numerous waste
            management and recycling businesses throughout the years. Almost
            tonnes of electronic waste was safely disposed of up until the end
            of 2022. <br />Each time a consumer chooses to have a defective
            product repaired rather than purchasing a new one, they are making
            a difference. Each time you purchase a used gadget that has been
            refurbished, you are making a difference. That is a significant
            issue, and we are proud of the contribution we are making, however
            small. <br />
          </p>
          <a href="contact-us" class="text-link-wrapper w-inline-block">
            <div class="text-link-text">Book a Repair</div>
            <div class="text-link-icon">
              <em class="italic-text-3"></em>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
 
  
@include('footer')