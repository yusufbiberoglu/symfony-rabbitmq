<?php


namespace App\Messenger\Handler;


use App\Messenger\Message\SyncMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SyncMessageHandler implements MessageHandlerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(SyncMessage $message): void
    {
        $this->logger->info(\sprintf('SyncMessage Received. Content: %s', $message->getData()));
    }

}
