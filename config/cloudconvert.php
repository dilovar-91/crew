<?php
return [

    /**
     * You can generate API keys here: https://cloudconvert.com/dashboard/api/v2/keys.
     */

    'api_key' => env('CLOUDCONVERT_API_KEY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFiMDUzYzAzYjZiOTQwZTk0OTU3ZGM2MTE0NDM3NzYyZGFmMDdlNDYxZmUyNTViMzA2MDQ4NGQxNmUwODA1ZDQ3NTRiZGE3YzE5ZjQzNDVkIn0.eyJhdWQiOiIxIiwianRpIjoiMWIwNTNjMDNiNmI5NDBlOTQ5NTdkYzYxMTQ0Mzc3NjJkYWYwN2U0NjFmZTI1NWIzMDYwNDg0ZDE2ZTA4MDVkNDc1NGJkYTdjMTlmNDM0NWQiLCJpYXQiOjE1ODc3NjM3MzksIm5iZiI6MTU4Nzc2MzczOSwiZXhwIjo0NzQzNDM3MzM5LCJzdWIiOiI0MTg4ODExMiIsInNjb3BlcyI6W119.NptaIEOOzFTHnklP6r4U--99XfGxYfyZSBbPt0LdN9t1Xe__hPjV7SviWzQ6yWImL6uitVHmdWKizgWIB5Zwtj_mFoNLhVF9rNGM7xIWcRKgWYJIsrTvdi7NjG-qe4y4_JNcMD_qf0743RxTYp90FQHNvaGqo2KsNp9sS-lyIZjQIODz5pnvudtEBJkV8HH106prM-4Yy5HT_xbxzm1Vsv9prjwxqDMOXZqvwhVGS4GUXrXxlpYhC8Hs5vxOBm6WQ84AdkDMXpnOhNMl1WyDNhgOxaDOYLcPGxkzcGJ5dm10ysP4DUfHfJNnsxych4kilkUI7uUGg26BkniDqvHFJOzgHkqmrgciwzYS82fjxBPPwj9vRmD-6DmWPPm0HcUb9VsyeWzDu7ye8PVKDhXN8Jdl0244ge60YwJYmOA0BxgSsBhahuk706QWsHRX30GRMzsiBJD01dXp-BHn-TG_Qc1fOTGNMl_pw7UtKj88wvYSczEk-79DXlfPj2U2ovIz69vzAwCCBccTneYZtPXZvhD5PRkp2tFsrewC5j6ZnWovlQofrkpwl64q1IARsAISO0SmB_IlQb65kL2onGlr-G_okl9T2qhODIJd-LroiAddVgOMPz6M-e_0Ukxc-b6agtzLyGPfN-DooSyMtmwN_XdFS7tHfy0Im95pinPweKQ'),

    /**
     * Use the CloudConvert Sanbox API (Defaults to false, which enables the Production API).
     */
    'sandbox' => env('CLOUDCONVERT_SANDBOX', true),

    /**
     * You can find the secret used at the webhook settings: https://cloudconvert.com/dashboard/api/v2/webhooks
     */
    'webhook_signing_secret' => env('CLOUDCONVERT_WEBHOOK_SIGNING_SECRET', '')

];
