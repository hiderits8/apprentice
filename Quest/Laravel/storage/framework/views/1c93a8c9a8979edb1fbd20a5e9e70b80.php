<?php if (isset($component)) { $__componentOriginal0f509fab02c45445826003a1e50db506 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f509fab02c45445826003a1e50db506 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.head','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f509fab02c45445826003a1e50db506)): ?>
<?php $attributes = $__attributesOriginal0f509fab02c45445826003a1e50db506; ?>
<?php unset($__attributesOriginal0f509fab02c45445826003a1e50db506); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f509fab02c45445826003a1e50db506)): ?>
<?php $component = $__componentOriginal0f509fab02c45445826003a1e50db506; ?>
<?php unset($__componentOriginal0f509fab02c45445826003a1e50db506); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalfd1f218809a441e923395fcbf03e4272 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd1f218809a441e923395fcbf03e4272 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $attributes = $__attributesOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__attributesOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $component = $__componentOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__componentOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>


<div class="article-page">
    <div class="banner">
      <div class="container">
        <h1>How to build webapps that scale</h1>
  
        <div class="article-meta">
          <a href="/profile/eric-simons"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
          <div class="info">
            <a href="/profile/eric-simons" class="author">Eric Simons</a>
            <span class="date">January 20th</span>
          </div>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-plus-round"></i>
            &nbsp; Follow Eric Simons <span class="counter">(10)</span>
          </button>
          &nbsp;&nbsp;
          <button class="btn btn-sm btn-outline-primary">
            <i class="ion-heart"></i>
            &nbsp; Favorite Post <span class="counter">(29)</span>
          </button>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-edit"></i> Edit Article
          </button>
          <button class="btn btn-sm btn-outline-danger">
            <i class="ion-trash-a"></i> Delete Article
          </button>
        </div>
      </div>
    </div>
  
    <div class="container page">
      <div class="row article-content">
        <div class="col-md-12">
          <p>
            Web development technologies have evolved at an incredible clip over the past few years.
          </p>
          <h2 id="introducing-ionic">Introducing RealWorld.</h2>
          <p>It's a great solution for learning how other frameworks work.</p>
          <ul class="tag-list">
            <li class="tag-default tag-pill tag-outline">realworld</li>
            <li class="tag-default tag-pill tag-outline">implementations</li>
          </ul>
        </div>
      </div>
  
      <hr />
  
      <div class="article-actions">
        <div class="article-meta">
          <a href="profile.html"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
          <div class="info">
            <a href="" class="author">Eric Simons</a>
            <span class="date">January 20th</span>
          </div>
  
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-plus-round"></i>
            &nbsp; Follow Eric Simons
          </button>
          &nbsp;
          <button class="btn btn-sm btn-outline-primary">
            <i class="ion-heart"></i>
            &nbsp; Favorite Article <span class="counter">(29)</span>
          </button>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-edit"></i> Edit Article
          </button>
          <button class="btn btn-sm btn-outline-danger">
            <i class="ion-trash-a"></i> Delete Article
          </button>
        </div>
      </div>
  
      <div class="row">
        <div class="col-xs-12 col-md-8 offset-md-2">
          <form class="card comment-form">
            <div class="card-block">
              <textarea class="form-control" placeholder="Write a comment..." rows="3"></textarea>
            </div>
            <div class="card-footer">
              <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
              <button class="btn btn-sm btn-primary">Post Comment</button>
            </div>
          </form>
  
          <div class="card">
            <div class="card-block">
              <p class="card-text">
                With supporting text below as a natural lead-in to additional content.
              </p>
            </div>
            <div class="card-footer">
              <a href="/profile/author" class="comment-author">
                <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
              </a>
              &nbsp;
              <a href="/profile/jacob-schmidt" class="comment-author">Jacob Schmidt</a>
              <span class="date-posted">Dec 29th</span>
            </div>
          </div>
  
          <div class="card">
            <div class="card-block">
              <p class="card-text">
                With supporting text below as a natural lead-in to additional content.
              </p>
            </div>
            <div class="card-footer">
              <a href="/profile/author" class="comment-author">
                <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
              </a>
              &nbsp;
              <a href="/profile/jacob-schmidt" class="comment-author">Jacob Schmidt</a>
              <span class="date-posted">Dec 29th</span>
              <span class="mod-options">
                <i class="ion-trash-a"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?><?php /**PATH /Applications/MAMP/htdocs/quest/laravel/resources/views/article.blade.php ENDPATH**/ ?>