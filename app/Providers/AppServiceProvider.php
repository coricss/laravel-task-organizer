<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function-definition function">boot</span> <span class="token punctuation">(</span> <span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
            <span class="token keyword">if</span> <span class="token punctuation">(</span> <span class="token variable">$this</span> <span class="token operator">-&gt;</span> <span class="token property">app</span> <span class="token operator">-&gt;</span> <span class="token function">environment</span> <span class="token punctuation">(</span> <span class="token string single-quoted-string">'production'</span> <span class="token punctuation">)</span> <span class="token punctuation">)</span> <span class="token punctuation">{</span>
                <span class="token class-name static-context">URL</span> <span class="token operator">::</span> <span class="token function">forceScheme</span> <span class="token punctuation">(</span> <span class="token string single-quoted-string">'https'</span> <span class="token punctuation">)</span> <span class="token punctuation">;</span>
            <span class="token punctuation">}</span>
        <span class="token punctuation">}</span>
    }
}
