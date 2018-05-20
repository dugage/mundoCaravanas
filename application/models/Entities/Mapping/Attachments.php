<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Attachments
 *
 * @ORM\Table(name="ATTACHMENTS")
 * @ORM\Entity
 */
class Attachments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="table_attachment", type="string", length=25, nullable=true)
     */
    private $tableAttachment;

    /**
     * @var integer
     *
     * @ORM\Column(name="row_id", type="integer", nullable=true)
     */
    private $rowId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="discharge_date", type="datetime", nullable=false)
     */
    private $dischargeDate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="attached", type="string", length=250, nullable=true)
     */
    private $attached;


}

