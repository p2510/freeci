<form wire:submit.prevent='checkout' class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 content-right-offset">



            <!-- Hedaline -->
            <h3>Choisir un plan</h3>
            <x-input-error :messages="$errors->get('plan_selected')" class="mt-2" />

            <div class="billing-cycle margin-top-25">

                <!-- Radio -->
                <div class="radio">
                    <input wire:click="choosePlan('basic')" value="basic" wire:model='plan_selected' id="radio-5"
                        name="plan_selected" type="radio" @if ($plan == 'basic' || is_null($plan)) checked @endif>
                    <label for="radio-5">
                        <span class="radio-label"></span>
                        Plan Basic
                        <span class="billing-cycle-details">
                            <span class="regular-price-tag">1.000 F </span>
                        </span>
                    </label>
                </div>

                <!-- Radio -->
                <div class="radio">
                    <input wire:click="choosePlan('pro')" value="pro" id="radio-6" wire:model='plan_selected'
                        name="plan_selected" type="radio" @if ($plan == 'pro') checked @endif>
                    <label for="radio-6"><span class="radio-label"></span>
                        Plan pro
                        <span class="billing-cycle-details">
                            <span class="discounted-price-tag">5.000 F</span>
                        </span>
                    </label>
                </div>


                <!-- Radio -->

                <div class="radio">
                    <input wire:click="choosePlan('expert')" value="expert" id="radio-7" wire:model='plan_selected'
                        name="plan_selected" type="radio" @if ($plan == 'expert') checked @endif>
                    <label for="radio-7"><span class="radio-label"></span>
                        Plan expert
                        <span class="billing-cycle-details">
                            <span class="discounted-price-tag">8.000 F </span>
                        </span>
                    </label>
                </div>
            </div>


            <!-- Hedline -->
            <h3 class="margin-top-50">Moyen de paiment</h3>
            <x-input-error :messages="$errors->get('payment_type')" class="mt-2" />


            <!-- Payment Methods Accordion -->
            <div class="payment margin-top-30">
                <div class="payment-tab @if ($payment_type == 'money') payment-tab-active @endif ">
                    <div class="payment-tab-trigger">
                        <input type="radio" name="payment_type" wire:model='payment_type' id="creditCart"
                            @if ($payment_type == 'money') checked @endif value="money">
                        <label for="creditCart">Wave , Orange money , Moov money , Mtn money , Carte de crédit</label>
                        <img class="payment-logo" src="https://i.imgur.com/IHEKLgm.png" alt="">
                    </div>

                    <div class="payment-tab-content">
                        <p>Vous serez redirigé vers paytech pour effectuer le paiement. Si vous êtes en Côte d'ivoire
                            choisissez <strong>CI</strong> à la place de <strong>SN</strong> après avoir cliquer sur
                            <mark>Procéder au paiement</mark>
                        </p>
                    </div>
                </div>
                <div class="payment-tab @if ($payment_type == 'cash') payment-tab-active @endif ">
                    <div class="payment-tab-trigger">
                        <input id="cash" name="payment_type" wire:model='payment_type'
                            @if ($payment_type == 'cash') checked @endif type="radio" value="cash">
                        <label for="cash">Dépot cash</label>
                        <img class="payment-logo paypal" src="https://i.imgur.com/ApBxkXU.png" alt="">
                    </div>

                    <div class="payment-tab-content">
                        <p>Vous devez faire un dépot dans un guichet sur un numéro de votre choix :
                            <br> Orange Money : +225 07 07 92 91 92
                            <br> Mtn Mooney : +225 05 05 00 95 96
                            <br> Wave : +225 07 08 96 65 87 <br>
                            Après cela , vous devez envoyer une photo du réçu sur ce numéro whatsapp : +225 07 07 95 95
                            68 et vous recevrez donc un code d'activation par message  que vous pourrez renseigner pour confirmer . 

                        </p>
                    </div>
                </div>




            </div>
            <!-- Payment Methods Accordion / End -->

            @if ($payment_type == 'money')
            <button type="submit" class="button big ripple-effect margin-top-40 margin-bottom-65">Procéder au
                paiement</button>
            @else 
            <a href="{{route('cash.code')}}" class="button big ripple-effect margin-top-40 margin-bottom-65">Saisir le code</a>
            @endif
        
        </div>


        <!-- Summary -->
        <div class="col-xl-4 col-lg-4 margin-top-0 margin-bottom-60">

            <!-- Summary -->
            <div class="boxed-widget summary margin-top-0">
                <div class="boxed-widget-headline">
                    <h3>Résumé</h3>
                </div>
                <div class="boxed-widget-inner">
                    <ul>

                        <li>Plan {{ $plan }} <span>{{ $price }} F</span></li>
                        <li class="total-costs">Total<span>{{ $price }} F</span></li>
                    </ul>
                </div>
            </div>
            <!-- Summary / End -->

            <!-- Checkbox -->
            <div class="checkbox margin-top-30">
                <input type="checkbox" name="terms" wire:model='terms' value="terms" id="two-step" checked>
                <label for="two-step"><span class="checkbox-icon"></span> je suis d'accord avec le <a
                        href="#">Termes et
                        Conditions</a> et les <a href="#">Conditions générales</a></label>
                <x-input-error :messages="$errors->get('terms')" class="mt-2" />

            </div>
        </div>
        
    </div>
</form>
