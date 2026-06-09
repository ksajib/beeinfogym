'use client';
import Image from 'next/image';
import Link from 'next/link';
import { usePathname } from 'next/navigation';
import { Button } from '../ui/button';
import { MoveRightIcon } from 'lucide-react';

const Navbar = () => {
    const pathName = usePathname();

    const navigationLinks = [
        { title: 'Home', href: '/' },
        { title: 'About', href: '/about' },
        { title: 'Access control', href: '/gym-access-control' },
        { title: 'pricing', href: '/pricing' },
        { title: 'Fitness Blog', href: '/fitness-blog' },
        { title: 'Carreers', href: '/careers' },
        { title: 'Contact', href: '/contact' },
    ];

    return (
        <nav className="container mx-auto px-0 py-3 flex items-center justify-between">
            {/* Logo */}
            <div className="flex items-center">
                <Link href="/">
                    <Image src="/images/logo-light.png" alt="Logo" width={100} height={50} />
                </Link>
            </div>

            {/* Navigation Links */}
            <div className="flex items-center gap-4">
                {navigationLinks.map((link, i) => (
                    <Link
                        key={i}
                        href={link.href}
                        className={`text-white font-mono hover:text-blue-500 ${pathName === link.href ? 'text-blue-500' : ''}`}
                    >
                        {link.title}
                    </Link>
                ))}

                <Button variant="cta" className="font-mono px-5 py-5 flex gap-2 items-center">
                    Get Started
                    <MoveRightIcon />
                </Button>
            </div>
        </nav>
    );
};

export default Navbar;
