<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('شكرًا لتسجيلك! قبل البدء، يُرجى تأكيد عنوان بريدك الإلكتروني من خلال النقر على الرابط الذي أرسلناه لك عبر البريد الإلكتروني. إذا لم تتلقَ البريد الإلكتروني، سنكون سعداء بإرسال بريد آخر لك.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('إعادة إرسال بريد التحقق') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('تسجيل الخروج') }}
            </button>
        </form>
    </div>
</x-guest-layout>
