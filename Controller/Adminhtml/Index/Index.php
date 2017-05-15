<?php
namespace Estdevs\AdditionalShippingBlock\Controller\Adminhtml\Index;
class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'ACL RULE HERE';
    protected $resultPageFactory;
    protected $request;
    public function __construct(
        \Magento\Framework\App\Request\Http $request,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->request = $request;
        return parent::__construct($context);
    }

    public function execute()
    {
        $result = array();
        echo $imageData = $this->request->getParam('image');
        echo $receiver = $this->request->getParam('receiver');
        // $imageData = $this->request->getParam('image');

        if(isset($imageData)) {
            $this->base64ToImage($imageData);
        }

        echo json_encode($result);

        // return $this->resultPageFactory->create();
    }

    public function base64ToImage($imageData){
        $data = 'data:image/png;base64,AAAFBfj42Pj4';
        list($type, $imageData) = explode(';', $imageData);
        list(,$extension) = explode('/',$type);
        list(,$imageData)      = explode(',', $imageData);
        $fileName = uniqid().'.'.$extension;
        $imageData = base64_decode($imageData);
        file_put_contents($fileName, $imageData);
    }
}
