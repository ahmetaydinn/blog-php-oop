<?php

class PostCest {

    public function _before(AcceptanceTester $I) {
        
    }

    public function _after(AcceptanceTester $I) {
        
    }

    /**
     * Test required field of a post form
     * @param \Step\Acceptance\Admin $I
     */
    public function testPostFieldsRequirements(\Step\Acceptance\Admin $I) {
        $I->loginAsAdmin();
        $I->amOnPage('index.php?r=post/create');
        $I->see('New Post');
        $I->see('Title');
        $I->see('Description');
        $I->see('Publication Date');
        $I->see('Submit');

        $I->click('Submit');
        $I->see('Title is required');
        $I->see('Description is required');
        $I->see('Publication Date is required');
    }

    /**
     * Test the size of the post fields
     * @param \Step\Acceptance\Admin $I
     */
    public function testPostFieldsSize(\Step\Acceptance\Admin $I) {
        $I->loginAsAdmin();
        $I->amOnPage('index.php?r=post/create');
        $I->see('New Post');
        $I->see('Title');
        $I->see('Description');
        $I->see('Publication Date');
        $I->see('Submit');

        $I->fillField('post[title]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique libero vitae interdum posuere1.');
        $I->fillField('post[description]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel dictum ligula. Etiam augue diam, condimentum maximus porta a, vestibulum ut elit. Nam sagittis eu nunc sit amet condimentum. Praesent varius magna in posuere posuere. Etiam a dapibus arcu. Mauris elementum condimentum lectus nec consectetur. Nunc vel ligula sem. Nunc pulvinar erat id dapibus interdum. Curabitur quis vulputate risus. Etiam pulvinar dui eu erat egestas, ac elementum lacus cursus. Morbi at neque diam. Mauris porta suscipit pulvinar. Etiam lobortis aliquet tellus ac imperdiet.
Nunc tristique tempor ultricies. Sed lacus orci, ullamcorper ut nulla sit amet, blandit iaculis neque. Fusce at viverra nibh, in laoreet libero. Curabitur feugiat mollis finibus. Vivamus a neque justo. Nullam vehicula efficitur posuere. In hac habitasse platea dictumst. Maecenas pharetra ante eu ex pellentesque, at vestibulum velit blandit. Nam semper, ex nec convallis molestie, leo lectus semper justo, laoreet blandit mauris mi malesuada diam. Ut et efficitur nunc, eu rhoncus odio.
Donec placerat feugiat ante, quis pretium diam tristique non. Nunc vitae faucibus lacus. Sed nulla neque, sagittis at dui sit amet, accumsan gravida risus. Praesent bibendum neque sit amet cursus venenatis. Maecenas ac ultrices tellus. Curabitur a venenatis nibh. Maecenas iaculis ornare ex in pellentesque. Nulla et ornare leo, sed tempor dolor.
Vivamus eu leo dolor. Nullam commodo est ut nunc mattis, a maximus elit tempus. Donec eget leo et sapien pretium molestie a eu libero. Curabitur pharetra ac nisi sed vehicula. Aliquam eleifend sed ligula eget faucibus. Proin sit amet tristique augue. Ut scelerisque, massa eget tincidunt viverra, quam tellus tristique massa, non rutrum ante nibh non enim. Sed malesuada hendrerit purus at commodo. Morbi aliquet urna et tortor mollis, at tempor erat feugiat. Maecenas sit amet mattis justo. Vivamus scelerisque nisl id ante malesuada faucibus.
Vivamus ut sodales velit. Proin ipsum nisi, cursus id facilisis nec, bibendum ut metus. Ut commodo turpis diam, eu volutpat mi pulvinar nec. Nunc porta metus est, ut sodales lorem fringilla id. Aliquam scelerisque nisi euismod tincidunt eleifend. Pellentesque maximus massa vitae lectus finibus sodales. Morbi ultricies lectus vitae ornare volutpat.
Ut sit amet urna enim. Pellentesque urna metus, faucibus eu nunc id, hendrerit volutpat nibh. Ut efficitur congue tortor nec euismod. Pellentesque pulvinar in ante lobortis pellentesque. Nulla semper luctus tempus. Pellentesque lacus ante, luctus eu nunc tempor, viverra ultricies est. Duis at dui non dolor finibus laoreet. Maecenas nec fringilla neque. Phasellus feugiat tellus aliquet, interdum neque sed, efficitur turpis. Fusce a justo nulla. Donec nec cursus massa. Sed efficitur libero non libero consequat pretium.
Vestibulum vel maximus risus, vitae consectetur nisl. Sed sagittis eleifend arcu, eu bibendum ex. Aliquam lacus sem, sodales ut nisl vel, hendrerit aliquet odio. Sed vitae turpis ac volutpat.');

        $I->fillField('post[date_publication]', '01/12/2017');
        $I->click('Submit');

        $I->see('Title max size is 100 characters');
        $I->see('Description max size is 3000 characters');
        $I->see('Publication Date with wrong format (Acept: 01.12.2017)');
    }

}
