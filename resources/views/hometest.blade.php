<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>
<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev" 
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>


<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>



<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>



<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>



<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>



<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>


<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>

<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>


<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>


<h1>TESTSETSETSET</h1>
 <h1 id="aliases">Aliases<a href="#aliases" class="anchor">#</a></h1>
<h2 id="why-aliases-">Why aliases?<a href="#why-aliases-" class="anchor">#</a></h2>
<p>When you are using a VCS repository, you will only get comparable versions for
branches that look like versions, such as <code>2.0</code> or <code>2.0.x</code>. For your <code>master</code> branch, you
will get a <code>dev-master</code> version. For your <code>bugfix</code> branch, you will get a
<code>dev-bugfix</code> version.</p>
<p>If your <code>master</code> branch is used to tag releases of the <code>1.0</code> development line,
i.e. <code>1.0.1</code>, <code>1.0.2</code>, <code>1.0.3</code>, etc., any package depending on it will
probably require version <code>1.0.*</code>.</p>
<p>If anyone wants to require the latest <code>dev-master</code>, they have a problem: Other
packages may require <code>1.0.*</code>, so requiring that dev version will lead to
conflicts, since <code>dev-master</code> does not match the <code>1.0.*</code> constraint.</p>
<p>Enter aliases.</p>
<h2 id="branch-alias">Branch alias<a href="#branch-alias" class="anchor">#</a></h2>
<p>The <code>dev-master</code> branch is one in your main VCS repo. It is rather common that
someone will want the latest master dev version. Thus, Composer allows you to
alias your <code>dev-master</code> branch to a <code>1.0.x-dev</code> version. It is done by
specifying a <code>branch-alias</code> field under <code>extra</code> in <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "extra": {
        "branch-alias": {
            "dev-master": "1.0.x-dev"
        }
    }
}</code></pre>
<p>If you alias a non-comparable version (such as dev-develop) <code>dev-</code> must prefix the
branch name. You may also alias a comparable version (i.e. start with numbers,
and end with <code>.x-dev</code>), but only as a more specific version.
For example, 1.x-dev could be aliased as 1.2.x-dev.</p>
<p>The alias must be a comparable dev version, and the <code>branch-alias</code> must be present on
the branch that it references. For <code>dev-master</code>, you need to commit it on the
<code>master</code> branch.</p>
<p>As a result, anyone can now require <code>1.0.*</code> and it will happily install
<code>dev-master</code>.</p>
<p>In order to use branch aliasing, you must own the repository of the package
being aliased. If you want to alias a third party package without maintaining
a fork of it, use inline aliases as described below.</p>
<h2 id="require-inline-alias">Require inline alias<a href="#require-inline-alias" class="anchor">#</a></h2>
<p>Branch aliases are great for aliasing main development lines. But in order to
use them you need to have control over the source repository, and you need to
commit changes to version control.</p>
<p>This is not really fun when you just want to try a bugfix of some library that
is a dependency of your local project.</p>
<p>For this reason, you can alias packages in your <code>require</code> and <code>require-dev</code>
fields. Let's say you found a bug in the <code>monolog/monolog</code> package. You cloned
<a href="https://github.com/Seldaek/monolog">Monolog</a> on GitHub and fixed the issue in
a branch named <code>bugfix</code>. Now you want to install that version of monolog in your
local project.</p>
<p>You are using <code>symfony/monolog-bundle</code> which requires <code>monolog/monolog</code> version
<code>1.*</code>. So you need your <code>dev-bugfix</code> to match that constraint.</p>
<p>Just add this to your project's root <code>composer.json</code>:</p>
<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>

<pre><code class="language-javascript">{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/you/monolog"
        }
    ],
    "require": {
        "symfony/monolog-bundle": "2.0",
        "monolog/monolog": "dev-bugfix as 1.0.x-dev"
    }
}</code></pre>
<p>That will fetch the <code>dev-bugfix</code> version of <code>monolog/monolog</code> from your GitHub
and alias it to <code>1.0.x-dev</code>.</p>
<blockquote>
<p><strong>Note:</strong> If a package with inline aliases is required, the alias (right of
the <code>as</code>) is used as the version constraint. The part left of the <code>as</code> is
discarded. As a consequence, if A requires B and B requires <code>monolog/monolog</code>
version <code>dev-bugfix as 1.0.x-dev</code>, installing A will make B require
<code>1.0.x-dev</code>, which may exist as a branch alias or an actual <code>1.0</code> branch. If
it does not, it must be re-inline-aliased in A's <code>composer.json</code>.</p>
<p><strong>Note:</strong> Inline aliasing should be avoided, especially for published
packages. If you found a bug, try and get your fix merged upstream. This
helps to avoid issues for users of your package.</p>
</blockquote>
