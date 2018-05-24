<?php



use Doctrine\Mapping as ORM;

/**
 * Attachments
 *
 * @Table(name="ATTACHMENTS")
 * @Entity
 */
class Attachments
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="table_attachment", type="string", length=25, nullable=true)
     */
    private $tableAttachment;

    /**
     * @var integer
     *
     * @Column(name="row_id", type="integer", nullable=true)
     */
    private $rowId;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", nullable=false)
     */
    private $dischargeDate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @Column(name="attached", type="string", length=250, nullable=true)
     */
    private $attached;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;


}

