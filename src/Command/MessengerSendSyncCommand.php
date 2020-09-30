<?php

namespace App\Command;

use App\Messenger\Message\SyncMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerSendSyncCommand extends Command
{
    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:messenger:send-sync')
            ->setDescription('Send sync messages')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
       for ($i = 1; $i <= 10; ) {
        $this->bus->dispatch(new SyncMessage(\sprintf('Data for message %s', $i )));
        ++$i;
       }
       return Command::SUCCESS;
    }
}
















