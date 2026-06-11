<section id="faq" class="section-pad" style="background: var(--black);">
    <div class="container px-0">

        <div class="text-center mb-5">
            <div class="cheadline cheadline-center">Common Questions</div>
            <h2 class="section-title text-light">Frequently asked</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <x-common.faq-accordion :items="[
                    [
                        'question' => 'Can I switch plans later?',
                        'answer' =>
                            'Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle with no extra fees or penalties.',
                    ],
                    [
                        'question' => 'What is 24/7 Access Control?',
                        'answer' =>
                            'It\'s our integrated hardware solution that allows members to access your gym using RFID tags, QR codes, or the mobile app — even when no staff is present. Access is automatically revoked for expired memberships.',
                    ],
                    [
                        'question' => 'Is my data secure?',
                        'answer' =>
                            'Absolutely. We use enterprise-grade encryption and cloud infrastructure to ensure your business and member data is always protected. Automated backups are included on all plans.',
                    ],
                ]" />
            </div>
        </div>
    </div>
</section>
